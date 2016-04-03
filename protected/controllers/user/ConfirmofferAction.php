<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\TourOffer;
use application\models\defines\TouristStatus;
use application\models\defines\tourist\Helper as TouristHelper;
use application\models\defines\tour\Helper as TourHelper;

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

        $touristHelper = new TouristHelper();
        $tourHelper = new TourHelper();
        $tourist = $touristHelper->confirmOffer($offer);
        $touristHelper->changeStatus($tourist, TouristStatus::GETTING_DISCONT);

        // Delete other tours
        foreach ($tourist->tours as $tour) 
        {
            if($tour->id != $offer->tour->id)
            {
                $tourHelper->delete($tour->id);
            }
        }

        $this->controller->redirect('/user/dashboard/' . $offer->tour->touristId . '?tab=tab5');
    }
}