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

namespace application\models\Entity\Touragent;

use application\models\entities;

class Repository
{

    public static function total($touragentId)
    {
        $criteria = new \CDbCriteria();
        $criteria->addCondition('touragentId = :id');
        $criteria->params['id'] = $touragentId;

        return entities\TouragentOffer::model()->count($criteria);
    }

    public static function getTouragentNames()
    {
        $names = \Yii::app()->db->createCommand()
            ->select('name')
            ->from('tbl_touragent')
            ->where('status = 1')
            ->queryColumn();
            
        return $names;
    }
}
