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

namespace application\models\Entity\Touragent\Offer;

use application\models\entities;

class Repository
{

    public static function findAll($touragentId, $date1, $date2)
    {
        $criteria = new \CDbCriteria();
        $criteria->addCondition('touragentId = :id');
        $criteria->addCondition('createdAt BETWEEN :date1 AND :date2');
        $criteria->params = [
            'date1' => $date1->format('Y-m-d H:i:s'),
            'date2' => $date2->format('Y-m-d H:i:s'),
            'id' => $touragentId
        ];
        $criteria->order = 'createdAt';

        return entities\TouragentOffer::model()->findAll($criteria);
    }
}
