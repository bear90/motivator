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

class EdittourAction extends \CAction
{

    public function run()
    {
        $tourId = \Yii::app()->request->getParam('tourId');
        $tour = TouristTour::model()->findByPk($tourId);

        $manager = \Yii::app()->user->getState('manager');

        if(!$tour || !$manager || $tour->managerId != $manager->id)
        {
            throw new \CHttpException(404, 'Not found');
        }

        DbTransaction::begin();
        try{

            $data = (array) \Yii::app()->request->getParam('Tour');
            $bookingEndDate = new \DateTime($data['bookingEndDate']);
            $paymentEndDate = new \DateTime($data['paymentEndDate']);
            $currentDate = new \DateTime();

            $data['bookingEndDate'] = $data['bookingEndDate'] ? $bookingEndDate->format("Y-m-d H:i:s") : null;
            $data['paymentEndDate'] = $paymentEndDate->format("Y-m-d H:i:s");
            
            $tour->attributes = $data;
            $tour->save();

            if($tour->hasErrors()){
                throw new \Exception(\Tool::errorToString($tour->errors));
            }

            $tourist = Tourist::model()->findByPk($tour->touristId, ['with'=>['tour']]);
        
            Logs::info("{$tourist->firstName} {$tourist->lastName} (#{$tourist->id}) modified tour to", $tour->attributes);
            
            $tourist->counterStartedAt = $currentDate->format("Y-m-d H:i:s");
            $tourist->counterDate = $data['bookingEndDate'] ?: $data['paymentEndDate'];
            $tourist->counterReason = $data['bookingEndDate'] 
                ? CounterReason::WAIT_BOOKING_PREPAYMENT
                : CounterReason::WAIT_PAYMENT;
            $tourist->save();

            \Tool::informTourist($tourist, 'exchange_tour');

            DbTransaction::commit();

        } catch (Exception $e) {
            DbTransaction::rollBack();
            throw $e;
        }

        $this->controller->redirect('/user/dashboard/' . $tourist->id . '?tab=tab5');
    }
}