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
            $touristHelper = new TouristHelper();
            $touristHelper->changeStatus($tourist, TouristStatus::HAVE_DISCONT);
            $touristHelper->update($tourist->id, [
                'counterReason' => CounterReason::WAIT_END_OF_TOUR,
                'tourFinishAt' => $tourist->tour->endDate
            ]);

            \Tool::informTourist($tourist, 'paid_tour');

            DbTransaction::commit();
            
            $this->controller->redirect('/user/dashboard/' . $tourist->id . '?tab=tab5');
        } catch (\Exception $e) {
            DbTransaction::rollBack();
            throw $e;
        }
        
    }
}