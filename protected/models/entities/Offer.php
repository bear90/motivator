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


class Offer extends BaseEntity
{
    public function rules(){
        return [
            ['contact, description, priceType, taskId', 'required'],
            ['price, earlyPrice, lastMinPrice', 'type', 'type' => 'integer'],
            ['createdBy', 'safe']
        ];
    }

    public function relations()
    {
        return [
            'task'=>[self::BELONGS_TO, 'application\\models\\entities\\Task', 'taskId'],
            'user'=>[self::BELONGS_TO, 'application\\models\\entities\\User', 'createdBy'],
        ];
    }

    public function tableName()
    {
        return 'tbl_offer';
    }
}
