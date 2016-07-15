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


class CalculateChoiceTourAction extends \CApiAction
{
    public function doRun()
    {
        $startDate = \Yii::app()->request->getParam('startDate');
        $endDate = \Yii::app()->request->getParam('endDate');
        $price = (int) \Yii::app()->request->getParam('price');
        
        return ['asd' => 123];

    }
}