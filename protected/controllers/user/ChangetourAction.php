<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\defines\CounterReason;
use application\models\TouristTour;
use application\models\Discont;
use application\models\Tourist;
use application\models\Configuration;
use application\models\defines\TouristStatus;
use application\components\DbTransaction;
use application\models\Logs;
use application\models\Touragent;

class ChangetourAction extends \CAction
{

    public function run()
    {
        $tourId = \Yii::app()->request->getParam('tourId');
        $tour = TouristTour::model()->findByPk($tourId);
        $tourist = Tourist::model()->findByPk($tour->touristId, ['with'=>['tour']]);
        $manager = \Yii::app()->user->getState('manager');
        $discontHandler = new Discont\Handler();
        $discontHandler->addBeforeTourist(clone $tourist);

        if(!$tour || !$manager || $tour->managerId != $manager->id)
        {
            throw new \CHttpException(404, 'Not found');
        }

        DbTransaction::begin();
        try{
            $parentTourist = null;
            if($tourist->groupCode) {
                $pid = (int) $tourist->groupCode;
                $parentTourist = Tourist::model()->findByPk($pid);
            }
            $touragent = Touragent::model()->findByPk($manager->touragentId);

            $data = (array) \Yii::app()->request->getParam('Tour');
            $bookingEndDate = new \DateTime($data['bookingEndDate']);
            $paymentEndDate = new \DateTime($data['paymentEndDate']);
            $currentDate = new \DateTime();

            $startDate = new \DateTime($data['startDate']);
            $endDate = new \DateTime($data['endDate']);
            $data['startDate'] = $startDate->format("Y-m-d H:i:s");
            $data['endDate'] = $endDate->format("Y-m-d H:i:s");
            $data['bookingEndDate'] = $data['bookingEndDate'] ? $bookingEndDate->format("Y-m-d H:i:s") : null;
            $data['paymentEndDate'] = $paymentEndDate->format("Y-m-d H:i:s");
            $data['price'] = $touragent->getBynPrice($data['currency'], $data['currencyUnit']);

            $confPrepayment = Configuration::get(Configuration::PREPAYMENT);
            $newPrepayment = round($data['price'] * $confPrepayment / 100, 2);
            $oldPrepayment = round($tour->price * $confPrepayment / 100, 2);
            
            $tour->attributes = $data;
            if($tour->prepayment < $newPrepayment)
            {
                $tour->prepayment = $newPrepayment;
            }
            $tour->save();
            $tourist->refresh();

            $tourist->counterStartedAt = $currentDate->format("Y-m-d H:i:s");
            $tourist->counterDate = $data['bookingEndDate'] ?: $data['paymentEndDate'];
            $tourist->counterReason = $data['bookingEndDate'] 
                ? CounterReason::WAIT_BOOKING_PREPAYMENT
                : CounterReason::WAIT_PAYMENT;
            $tourist->save();

            Logs::info("{$tourist->firstName} {$tourist->lastName} (#{$tourist->id}) changed tour to", $tour->attributes);

            if($tour->hasErrors()){
                throw new \Exception(\Tool::errorToString($tour->errors));
            }

            \Tool::informTourist($tourist, 'exchange_tour');
            $prepayment = $newPrepayment - $oldPrepayment;
            switch(true)
            {
                case ($parentTourist && $parentTourist->statusId == TouristStatus::GETTING_DISCONT && $prepayment > 0):
                    $discontHandler->increaseParentDiscont($tourist, $parentTourist, $prepayment);
                    \Tool::informTourist($parentTourist, 'exchange_tour_partner', ['child' => $tourist]);
                    break;


                case ($parentTourist && $parentTourist->statusId == TouristStatus::GETTING_DISCONT && $prepayment < 0):
                    $discontHandler->decreaseParentDiscont($tourist, $parentTourist, $prepayment);
                    \Tool::informTourist($parentTourist, 'exchange_tour_partner', ['child' => $tourist]);
                    break;

                case ($parentTourist && $parentTourist->statusId == TouristStatus::HAVE_DISCONT):
                case ($parentTourist === null):
                    $discontHandler->changeAbonentDiscountWithoutParent($tourist, $prepayment);
                    break;
            }

            DbTransaction::commit();

        } catch (DiscountException $e){
            DbTransaction::rollBack();

            \Yii::app()->user->setFlash('message', "Произошла ошибка расчета");
            \Tool::sendEmailWithView('konditer-print@mail.ru', 'checking_delta_fail', ['tourist' => $tourist]);

            throw $e;
        } catch (Exception $e) {
            DbTransaction::rollBack();
            throw $e;
        }

        $this->controller->redirect('/user/dashboard/' . $tourist->id . '?tab=tab5');
    }
}