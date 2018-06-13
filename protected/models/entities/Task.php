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

namespace application\models\entities;


class Task extends BaseEntity
{
    public function rules(){
        return [
            ['name, email, tourType, adultCount, childCount, days, startedAt, finishedAt', 'required'],
            ['generalPrice, earlyPrice, lastMinPrice, userId, planPrice, description', 'safe']
        ];
    }

    public function relations()
    {
        return [
            'countriesLinks'=>[self::HAS_MANY, 'application\\models\\entities\\TaskCountry', 'taskId'],
            'countries'=>[self::HAS_MANY, 'application\\models\\entities\\Country', 'countryId', 'through' => 'countriesLinks'],
            'childAges'=>[self::HAS_MANY, 'application\\models\\entities\\TaskChildAge', 'taskId'],
            'relTourType'=>[self::BELONGS_TO, 'application\\models\\entities\\TourType', 'tourType'],
            'relName'=>[self::BELONGS_TO, 'application\\models\\entities\\UserName', 'name'],
            'offers'=>[self::HAS_MANY, 'application\\models\\entities\\Offer', 'taskId'],
            'user'=>[self::BELONGS_TO, 'application\\models\\entities\\User', 'userId'],
        ];
    }

    public function tableName()
    {
        return 'tbl_task';
    }
}
