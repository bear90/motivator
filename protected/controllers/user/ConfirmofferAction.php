<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\TourOffer;
use application\models\Tourist;
use application\models\defines\TouristStatus;
use application\models\defines\tourist\Helper as TouristHelper;
use application\models\defines\tour\Helper as TourHelper;

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
        
        $isChangeOffer = $tourist->offerId > 0;
        $touristHelper->confirmOffer($offer);
        $touristHelper->changeStatus($tourist, TouristStatus::GETTING_DISCONT);
        $touristHelper->resetTimer($tourist);

        // Delete other tours
        foreach ($tourist->tours as $tour) 
        {
            if($tour->id != $offer->tour->id)
            {
                $tourHelper->delete($tour->id);
            }
        }

        $parentTourist = null;
        if($tourist->groupCode) {
            $pid = (int) $tourist->groupCode;
            $parentTourist = Tourist::model()->findByPk($pid);
        }

        if (!$isChangeOffer)
        {
            \Tool::informTourist($tourist, 'after_prepayment');
            if($parentTourist)
            {
                \Tool::informTourist($parentTourist, 'partner_message');
            }
        } else {
            \Tool::informTourist($tourist, 'exchange_tour');
            if($parentTourist)
            {
                \Tool::informTourist($parentTourist, 'exchange_tour_partner', ['child' => $tourist]);
            }
        }
        

        $this->controller->redirect('/user/dashboard/' . $offer->tour->touristId . '?tab=tab5');
    }
}