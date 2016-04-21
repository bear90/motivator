<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\TourOffer;
use application\models\Tourist;
use application\models\Discont;
use application\models\defines\TouristStatus;
use application\models\defines\tourist\Helper as TouristHelper;
use application\models\defines\tour\Helper as TourHelper;
use application\components\DbTransaction;

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
        
        DbTransaction::begin();
        try {
            $isChangeOffer = $tourist->offerId > 0;
            $tourist = $touristHelper->confirmOffer($offer);
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
                $parentTourist = Tourist::model()->findByPk($pid, ['with' => ['offer']]);
            }
            $discontHandler = new Discont\Handler();

            if (!$isChangeOffer)
            {
                \Tool::informTourist($tourist, 'after_prepayment');
                if($parentTourist && $parentTourist->statusId == TouristStatus::GETTING_DISCONT)
                {
                    $discontHandler->increaseParentDiscont($parentTourist, $offer->price);
                    \Tool::informTourist($parentTourist, 'partner_message');
                } else {
                    $discontHandler->increaseAbonentDiscont($tourist, $offer->price);
                }
            } else {
                \Tool::informTourist($tourist, 'exchange_tour');
                if($parentTourist && $parentTourist->statusId == TouristStatus::GETTING_DISCONT)
                {
                    \Tool::informTourist($parentTourist, 'exchange_tour_partner', ['child' => $tourist]);
                }
            }

            DbTransaction::commit();

        } catch (Exception $e) {
            DbTransaction::rollBack();
            throw $e;
        }
        
        

        $this->controller->redirect('/user/dashboard/' . $offer->tour->touristId . '?tab=tab5');
    }
}