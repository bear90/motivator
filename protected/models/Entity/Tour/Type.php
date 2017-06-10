<?php

/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       06.06.2017
 * @package
 * @copyright   Copyright (c) 2015-2017 soXes GmBh.
 *
 */
namespace application\models\Entity\Tour;
use application\models\entities;

class Type
{
    public static function getOptions()
    {
        $list = entities\TourType::model()->options()->findAll();
        $list = \CHtml::listData($list, 'id', 'name');

        return $list;
    }
}