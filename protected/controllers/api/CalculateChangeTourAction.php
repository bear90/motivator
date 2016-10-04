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

use application\models\Tourist;
use application\models\TourCalculator;


class CalculateChangeTourAction extends \CApiAction
{
    private $default = [
        'touristId' => '',
        'startDate' => '',
        'endDate' => '',
        'price' => '',
        'oldPrepayment' => '',
        'prepayment' => '',
        'surchangePrepayment' => '',
        'overPrepayment' => '',
        'minDiscount' => '',
        'oldAbonentDiscount' => '',
        'curMaxDiscount' => '',
        'overMaxDiscount' => '',
        'abonentDiscount' => '',
        'totalAbonentDiscount' => '',
        'partnerDiscount' => '',
        'totalDiscount' => '',
        'surchange' => '',
        'maxDiscount' => '',
        'surchangeOnMaxDiscount' => '',
    ];

    public function doRun()
    {
        $mode = \Yii::app()->request->getParam('mode', 'change');
        $touristId = \Yii::app()->request->getParam('touristId');
        $start = \Yii::app()->request->getParam('startDate');
        $end = \Yii::app()->request->getParam('endDate');
        $currencyUnit = \Yii::app()->request->getParam('currencyUnit');
        $price = (float) \Yii::app()->request->getParam('price');

        $touragent = \Yii::app()->user->model->touragent;
        $manager = \Yii::app()->user->getState('manager');
        $tourist = Tourist::model()->findByPk(intval($touristId));
        $price = $touragent->getBynPrice($price, $currencyUnit);

        if (!$price)
        {
            $bookingPrepayment = (float) \Yii::app()->request->getParam('bookingPrepayment');
            $bookingPrepaymentPaid = (float) \Yii::app()->request->getParam('bookingPrepaymentPaid');
            $currency = (float) \Yii::app()->request->getParam('currency');
            $currencyUnit = \Yii::app()->request->getParam('currencyUnit');
            $price = $touragent->getBynPrice($currency, $currencyUnit);
            $price = $touragent->getBynPrice($currency, $currencyUnit);
            $bookingPrepayment = $touragent->getBynPrice($bookingPrepayment, $currencyUnit);
        }

        // Restrict access for unknown agents
        if (!$touragent || !$manager || !$tourist || $tourist->tour->touragentId != $touragent->id ||
            $tourist->tour->managerId != $manager->id && !$manager->boss)
        {
            throw new \CHttpException(404, 'Not found');
        }

        $startDate = new \DateTime($start);
        $endDate = new \DateTime($end);
        $tourCalculator = new TourCalculator($price, $tourist);

        $prepayment = $tourCalculator->getPrepayment($startDate, $endDate, $touragent->id);
        $minDiscount = $tourCalculator->getMinDiscont($startDate, $endDate, $touragent->id);
        $maxDiscount = $tourCalculator->getMaxDiscont($startDate, $endDate, $touragent->id);
        $abonentDiscount = $tourCalculator->getAbonentDiscount($minDiscount, $maxDiscount);

        if ($tourist->tour === null)
        {
            return $this->default;
        }

        $partnerDiscount = $tourist->partnerDiscont;
        $oldAbonentDiscount = $tourist->abonentDiscont;
        $oldPrepayment = $tourist->tour->prepayment;
        $curMaxDiscount = $maxDiscount - $minDiscount;
        if (!isset($bookingPrepaymentPaid))
        {
            $bookingPrepaymentPaid = $tourist->tour->bookingPrepaymentPaid;
        }
        if (!isset($bookingPrepayment))
        {
            $bookingPrepayment = $tourist->tour->bookingPrepayment;
        }

        $overPrepayment = $oldPrepayment - $prepayment;
        $overMaxDiscount = $oldAbonentDiscount + $minDiscount - $maxDiscount;
        $surchangePrepayment = 0;
        
        // if it's necessary to do surchange
        if ($overPrepayment < 0) 
        {
            $surchangePrepayment = -1 * $overPrepayment;
            $overPrepayment = 0;
        }
        if ($overMaxDiscount < 0)
        {
            $overMaxDiscount = 0;
        }

        $totalDiscount = $abonentDiscount + $minDiscount + $partnerDiscount;
        $surchange = $price - $oldPrepayment - $totalDiscount - $surchangePrepayment - $bookingPrepaymentPaid;
        $surchangeOnMaxDiscount = $price - $oldPrepayment - $surchangePrepayment - $maxDiscount - $partnerDiscount - $bookingPrepaymentPaid;

        if ($mode == 'changeAndPaid')
        {
            $surchange += $surchangePrepayment;
        }

        $result = \CMap::mergeArray($this->default, [
            'touristId' => $touristId,
            'startDate' => $start,
            'endDate' => $end,
            'price' => \Tool::getNewPriceText($price),
            'oldPrepayment' => \Tool::getNewPriceText($oldPrepayment),
            'prepayment' => \Tool::getNewPriceText($prepayment),
            'surchangePrepayment' => \Tool::getNewPriceText($surchangePrepayment),
            'overPrepayment' => \Tool::getNewPriceText($overPrepayment),
            'minDiscount' => \Tool::getNewPriceText($minDiscount),
            'oldAbonentDiscount' => \Tool::getNewPriceText($oldAbonentDiscount),
            'curMaxDiscount' => \Tool::getNewPriceText($curMaxDiscount),
            'overMaxDiscount' => \Tool::getNewPriceText($overMaxDiscount),
            'abonentDiscount' => \Tool::getNewPriceText($abonentDiscount),
            'totalAbonentDiscount' => \Tool::getNewPriceText($abonentDiscount + $minDiscount),
            'partnerDiscount' => \Tool::getNewPriceText($partnerDiscount),
            'totalDiscount' => \Tool::getNewPriceText($totalDiscount),
            'surchange' => \Tool::getNewPriceText($surchange),
            'maxDiscount' => \Tool::getNewPriceText($maxDiscount),
            'surchangeOnMaxDiscount' => \Tool::getNewPriceText($surchangeOnMaxDiscount),
            'bookingPrepayment' => \Tool::getNewPriceText($bookingPrepayment),
            'bookingPrepaymentPaid' => \Tool::getNewPriceText($bookingPrepaymentPaid),
            'currencyUnit' => \Tool::getCurrencyList($currencyUnit)
        ]);
        
        return $result;
    }
}