<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       15.07.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\controllers\api;

use application\models\TourCalculator;

class CalculateChoiceTourAction extends \CApiAction
{
    private $default = [
        'startDate' => '',
        'endDate' => '',
        'price' => '',
        'prepayment' => '',
        'totalDiscount' => '',
        'surchange' => '',
        'minDiscount' => '',
        'currentAbonentDiscount' => '',
        'totalAbonentDiscount' => '',
        'partnerDiscount' => '',
        'maxAbonentDiscount' => '',
        'surchangeOnMaxAbonentDiscount' => '',
    ];

    public function doRun()
    {
        $start = \Yii::app()->request->getParam('startDate');
        $end = \Yii::app()->request->getParam('endDate');
        $price = (float) \Yii::app()->request->getParam('price');

        $touragent = \Yii::app()->user->model->touragent;
        $manager = \Yii::app()->user->getState('manager');

        // Restrict access for unknown agents
        if (!$touragent || !$manager)
        {
            throw new \CHttpException(404, 'Not found');
        }    

        $startDate = new \DateTime($start);
        $endDate = new \DateTime($end);
        $tourCalculator = new TourCalculator($price);

        $prepayment = $tourCalculator->getPrepayment($startDate, $endDate, $touragent->id);
        $minDiscount = $tourCalculator->getMinDiscont($startDate, $endDate, $touragent->id);
        $maxDiscount = $tourCalculator->getMaxDiscont($startDate, $endDate, $touragent->id);

        return \CMap::mergeArray($this->default, [
            'startDate' => $start,
            'endDate' => $end,
            'price' => \Tool::getNewPriceText($price),
            'prepayment' => \Tool::getNewPriceText($prepayment),
            'totalDiscount' => \Tool::getNewPriceText($minDiscount),
            'surchange' => \Tool::getNewPriceText($price - $prepayment - $minDiscount),
            'minDiscount' => \Tool::getNewPriceText($minDiscount),
            'currentAbonentDiscount' => \Tool::getNewPriceText(0),
            'totalAbonentDiscount' => \Tool::getNewPriceText($minDiscount),
            'partnerDiscount' => \Tool::getNewPriceText(0),
            'maxAbonentDiscount' => \Tool::getNewPriceText($maxDiscount),
            'surchangeOnMaxAbonentDiscount' => \Tool::getNewPriceText($price - $prepayment - $maxDiscount),
        ]);

    }
}