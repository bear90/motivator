<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\TourOffer;
use application\models\defines\TouristStatus;
use application\models\defines\tourist\Helper as TouristHelper;

class ConfirmofferAction extends \CAction
{

    public function run($id)
    {
        $offer = TourOffer::model()->with('tour')->findByPk($id);
        $manager = \Yii::app()->user->getState('manager');

        if(!$offer || !$manager || $offer->tour->managerId != $manager->id)
        {
            throw new \CHttpException(404, 'Not found');
        }

        $helper = new TouristHelper();
        $tourist = $helper->confirmOffer($offer);
        $helper->changeStatus($tourist, TouristStatus::GETTING_DISCONT);

        $this->controller->redirect('/user/dashboard/' . $offer->tour->touristId . '?tab=tab5');
    }
}