<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\TouristTour;
use application\models\Discont;
use application\models\Tourist;
use application\models\Configuration;
use application\models\defines\TouristStatus;
use application\components\DbTransaction;
use application\models\Logs;

class ChangetourAction extends \CAction
{

    public function run()
    {
        $tourId = \Yii::app()->request->getParam('tourId');
        $tour = TouristTour::model()->findByPk($tourId);
        $tourist = Tourist::model()->findByPk($tour->touristId, ['with'=>['tour']]);
        $manager = \Yii::app()->user->getState('manager');
        $discontHandler = new Discont\Handler();

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

            $data = (array) \Yii::app()->request->getParam('Tour');
            $confPrepayment = Configuration::get(Configuration::PREPAYMENT);
            $newPrepayment = round($data['price'] * $confPrepayment / 100);
            $oldPrepayment = round($tour->price * $confPrepayment / 100);
            
            $tour->attributes = $data;
            if($tour->prepayment < $newPrepayment)
            {
                $tour->prepayment = $newPrepayment;
            }
            $tour->save();
            $tourist->tour->refresh();

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
                    
                /*case ($parentTourist && $parentTourist->statusId == TouristStatus::HAVE_DISCONT && $prepayment > 0):
                    $discontHandler->increaseParentDiscont($tourist, $tourist, $prepayment);
                    break;
                    
                case ($parentTourist && $parentTourist->statusId == TouristStatus::HAVE_DISCONT && $prepayment < 0):
                    $discontHandler->increaseTouristAbonentDiscont($tourist, $prepayment);
                    break;*/

                case ($parentTourist && $parentTourist->statusId == TouristStatus::HAVE_DISCONT && $prepayment > 0):
                case ($parentTourist === null && $prepayment > 0):
                    $discontHandler->increaseAbonentDiscont($tourist, $prepayment);
                    break;

                case ($parentTourist && $parentTourist->statusId == TouristStatus::HAVE_DISCONT && $prepayment < 0):
                case ($parentTourist === null && $prepayment < 0):
                    $discontHandler->decreaseAbonentDiscont($tourist, $prepayment);
                    break;
            }

            DbTransaction::commit();

        } catch (Exception $e) {
            DbTransaction::rollBack();
            throw $e;
        }

        $this->controller->redirect('/user/dashboard/' . $tourist->id . '?tab=tab5');
    }
}