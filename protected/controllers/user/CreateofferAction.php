<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\defines\tour\Helper as TourHelper;
use application\models\defines\tour\offer\Helper;
use application\components\DbTransaction;

class CreateofferAction extends \CAction
{

    public function run()
    {
        $tourId = (int) \Yii::app()->request->getPost('tourId');
        $offers = (array) \Yii::app()->request->getPost('TourOffer');
        $tab = \Yii::app()->request->getPost('tab', 'tab1');

        $hasNewOffer = false;
        $offerHelper = new Helper();
        $tourHelper = new TourHelper();

        $manager = \Yii::app()->user->getState('manager');

        DbTransaction::begin();
        try {

            foreach ($offers as $number => $offer) {
                
                $startDate = new \DateTime($offer['startDate']);
                $endDate = new \DateTime($offer['endDate']);
                $paymentEndDate = new \DateTime($offer['paymentEndDate']);
                $bookingEndDate = new \DateTime($offer['bookingEndDate']);
                $newOffer = null;

                $data = $offer;
                $data['tourId'] = $tourId;
                $data['startDate'] = $startDate->format("Y-m-d H:i:s");
                $data['endDate'] = $endDate->format("Y-m-d H:i:s");
                $data['paymentEndDate'] = $paymentEndDate->format("Y-m-d H:i:s");
                $data['bookingEndDate'] = $offer['bookingEndDate'] ? $bookingEndDate->format("Y-m-d H:i:s"): null;
                $data['price'] = $manager->touragent->getBynPrice($data['currency'], $data['currencyUnit']);
                $data['bookingPrepaymentRub'] = $manager->touragent->getBynPrice($data['bookingPrepayment'], $data['currencyUnit']);

                if (!empty($offer['id']))
                {
                    $offerHelper->update($offer['id'], $data);
                } else {
                    $hasNewOffer = true;
                    $newOffer = $offerHelper->create($data);
                }
                
            }

            $tour = $tourHelper->setManager($tourId, $manager->id);

            DbTransaction::commit();

        } catch (\Exception $e) 
        {
            DbTransaction::rollBack();
            throw $e;
        }

        if ($hasNewOffer)
        {
            \Tool::informTourist($tour->tourist, 'new_offers', ['offer' => $newOffer]);
        }

        $this->controller->redirect('/user/dashboard/' . $tour->touristId . '?tab=' . $tab);
    }
}