<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\defines\CounterReason;
use application\models\TourOffer;
use application\models\Tourist;
use application\models\Discont;
use application\models\Configuration;
use application\models\defines\TouristStatus;
use application\models\defines\tourist\Helper as TouristHelper;
use application\models\defines\tour\Helper as TourHelper;
use application\components\DbTransaction;
use application\models\Logs;

class ConfirmofferAction extends \CAction
{

    public function run($id)
    {
        $isChangeOffer = false;
        $offer = TourOffer::model()->with('tour')->findByPk($id);
        $manager = \Yii::app()->user->getState('manager');

        if(!$offer || !$manager || $offer->tour->managerId != $manager->id)
        {
            throw new \CHttpException(404, 'Not found');
        }

        $tourist = Tourist::model()->findByPk($offer->tour->touristId);
        $touristHelper = new TouristHelper();
        $tourHelper = new TourHelper();
        $currentDate = new \DateTime();
        
        DbTransaction::begin();
        try {
            $isChangeOffer = $tourist->statusId == TouristStatus::GETTING_DISCONT;
            $tourist = $touristHelper->confirmOffer($offer);
            $touristHelper->changeStatus($tourist, TouristStatus::GETTING_DISCONT);

            if ($offer->bookingEndDate)
            {
                $touristHelper->update($tourist->id, [
                    'counterReason' => CounterReason::WAIT_BOOKING_PREPAYMENT,
                    'counterStartedAt' => $currentDate->format("Y-m-d"),
                    'counterDate' => $offer->bookingEndDate
                ]);
            } else {
                $touristHelper->update($tourist->id, [
                    'counterReason' => CounterReason::WAIT_PAYMENT,
                    'counterStartedAt' => $currentDate->format("Y-m-d"),
                    'counterDate' => $offer->paymentEndDate
                ]);
            }
            

            Logs::info("{$tourist->firstName} {$tourist->lastName} (#{$tourist->id}) bought tour", 
                $tourist->tour->attributes);

            $confPrepayment = Configuration::get(Configuration::PREPAYMENT);
            $prepayment = round($offer->price * $confPrepayment / 100, 2);

            // Delete whole tours
            foreach ($tourist->tours as $tour) 
            {
                $tourHelper->delete($tour->id);
            }

            $parentTourist = null;
            if($tourist->groupCode) {
                $pid = (int) $tourist->groupCode;
                $parentTourist = Tourist::model()->findByPk($pid, ['with' => ['tour']]);
            }
            $discontHandler = new Discont\Handler();

            \Tool::informTourist($tourist, 'after_prepayment');
            if($parentTourist && $parentTourist->statusId == TouristStatus::GETTING_DISCONT)
            {
                $discontHandler->increaseParentDiscont($tourist, $parentTourist, $prepayment);
                \Tool::informTourist($parentTourist, 'partner_message');
            } else {
                $discontHandler->increaseAbonentDiscont($tourist, $prepayment);
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
        
        $this->controller->redirect('/user/dashboard/' . $offer->tour->touristId . '?tab=tab5');
    }
}