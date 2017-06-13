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

    public static function getAll()
    {
        $with = ['countries', 'childAges'];
        $list = entities\Task::model()->findAll(['with' => $with]);

        return $list;
    }
}
