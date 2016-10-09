<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\defines\CounterReason;
use application\models\Tourist;
use application\models\defines\TouristStatus;
use application\models\defines\tourist\Helper as TouristHelper;
use application\models\defines\tour\Helper as TourHelper;
use application\components\DbTransaction;
use application\models\Touragent;
use application\models\TouristTour;
use application\models\Discont;
use application\models\Configuration;

class ConfirmpaidAction extends \CAction
{

    public function run($id)
    {
        $tourist = Tourist::model()->with('tour')->findByPk($id);
        $manager = \Yii::app()->user->getState('manager');

        if(!$tourist || !$manager || $tourist->tour->managerId != $manager->id)
        {
            throw new \CHttpException(404, 'Not found');
        }

        DbTransaction::begin();
        try {
            // Move Price and do calculation
            $parentTourist = null;
            if($tourist->groupCode) {
                $pid = (int) $tourist->groupCode;
                $parentTourist = Tourist::model()->findByPk($pid);
            }
            $touragent = Touragent::model()->findByPk($manager->touragentId);
            $tour = TouristTour::model()->findByPk($tourist->tour->id);
            $discontHandler = new Discont\Handler();
            $currentDate = new \DateTime();

            $newPrice = $touragent->getBynPrice($tour->currency, $tour->currencyUnit);
            $confPrepayment = Configuration::get(Configuration::PREPAYMENT);
            $newPrepayment = round($newPrice * $confPrepayment / 100, 2);
            $oldPrepayment = round($tour->price * $confPrepayment / 100, 2);

            $tour->price = $newPrice;
            $tour->paidAt = $currentDate->format("Y-m-d H:i:s");
            /*if($tour->prepayment < $newPrepayment)
            {
                $tour->prepayment = $newPrepayment;
            }*/
            if ($tour->bookingPrepayment && $tour->bookingPrepaymentPaid < $tour->bookingPrepayment)
            {
                $tour->bookingPrepaymentPaid = $tour->bookingPrepayment;
            }
            $tour->save();
            $tourist->refresh();
            // move current prepayment to touragent fond

            $amount = $newPrepayment - $oldPrepayment;
            $discontHandler->updateTourAgentAccount($tourist, $amount);

            // Change Status of the tourist
            $touristHelper = new TouristHelper();
            $touristHelper->changeStatus($tourist, TouristStatus::HAVE_DISCONT);
            $touristHelper->update($tourist->id, [
                'counterReason' => CounterReason::WAIT_END_OF_TOUR,
                'tourFinishAt' => $tourist->tour->endDate
            ]);
            
            $manager->addBonusByPrice($tourist->tour->price);

            \Tool::informTourist($tourist, 'paid_tour');

            DbTransaction::commit();
            
            $this->controller->redirect('/user/dashboard/' . $tourist->id . '?tab=tab5');
            
        } catch (DiscountException $e){
            DbTransaction::rollBack();

            \Yii::app()->user->setFlash('message', "Произошла ошибка расчета");
            \Tool::sendEmailWithView('konditer-print@mail.ru', 'checking_delta_fail', ['tourist' => $tourist]);

            throw $e;
        } catch (\Exception $e) {
            DbTransaction::rollBack();
            throw $e;
        }
        
    }
}