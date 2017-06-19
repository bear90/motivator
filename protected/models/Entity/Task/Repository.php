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

namespace application\models\Entity\Task;
use application\models\entities;


class Repository
{

    public static function getAll(\CDbCriteria $criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new \CDbCriteria();
        }
        $with = ['countries', 'childAges'];
        $criteria->with = array_unique(array_merge((array)$criteria->with, $with));
        $list = entities\Task::model()->findAll($criteria);

        return $list;
    }
}
