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
            ['contact, description, taskId', 'required'],
            ['type, sort', 'type', 'type' => 'integer'],
            ['price, earlyPrice, lastMinPrice', 'type', 'type' => 'float'],
            ['createdBy, touragentId', 'safe']
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
