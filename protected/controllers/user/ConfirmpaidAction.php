<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\Tourist;
use application\models\defines\TouristStatus;
use application\models\defines\tourist\Helper as TouristHelper;
use application\models\defines\tour\Helper as TourHelper;

class ConfirmpaidAction extends \CAction
{

    public function run($id)
    {
        $tourist = Tourist::model()->with('offer')->findByPk($id);
        $manager = \Yii::app()->user->getState('manager');

        if(!$tourist || !$manager || $tourist->offer->tour->managerId != $manager->id)
        {
            throw new \CHttpException(404, 'Not found');
        }

        $touristHelper = new TouristHelper();
        $touristHelper->changeStatus($tourist, TouristStatus::HAVE_DISCONT);
        $touristHelper->update($tourist, [
            'tourFinishAt' => $tourist->offer->endDate
        ]);

        \Tool::informTourist($tourist, 'paid_tour');
        
        $this->controller->redirect('/user/dashboard/' . $tourist->offer->tour->touristId . '?tab=tab5');
    }
}