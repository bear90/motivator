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

namespace application\models\Entity\User;
use application\models\entities;


class Name
{

    public static function getOptions1()
    {
        $list = entities\UserName::model()->options()->findAllByAttributes(['type' => 1]);
        $list = \CHtml::listData($list, 'id', 'name');

        return $list;
    }

    public static function getOptions2()
    {
        $list = entities\UserName::model()->options()->findAllByAttributes(['type' => 2]);
        $list = \CHtml::listData($list, 'id', 'name');

        return $list;
    }
}
