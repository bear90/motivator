<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\defines\tour\Helper as TourHelper;
use application\models\defines\tour\offer\Helper;

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

        \application\components\DbTransaction::begin();
        try {

            foreach ($offers as $number => $offer) {
                
                $startDate = new \DateTime($offer['startDate']);
                $endDate = new \DateTime($offer['endDate']);
                
                $data = $offer;
                $data['tourId'] = $tourId;
                $data['startDate'] = $startDate->format("Y-m-d H:i:s");
                $data['endDate'] = $endDate->format("Y-m-d H:i:s");

                if (!empty($offer['id']))
                {
                    $offerHelper->update($offer['id'], $data);
                } else {
                    $hasNewOffer = true;
                    $offerHelper->create($data);
                }
                
            }

            $tour = $tourHelper->setManager($tourId, $manager->id);

            \application\components\DbTransaction::commit();

        } catch (\Exception $e) 
        {
            \application\components\DbTransaction::rollBack();
            throw $e;
        }

        if ($hasNewOffer)
        {
            \Tool::sendEmailWithView($tour->tourist->email, 'Получены новые предложения на сайте МОТИВАТОР', 'new_offers');
        }

        $this->controller->redirect('/user/dashboard/' . $tour->touristId . '?tab=' . $tab);
    }
}