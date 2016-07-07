<?php

namespace application\models;

use application\components\DBEntity;

class TouragentParam extends DBEntity
{
    
    public function rules(){
        return [
            ['touragentId', 'exist', 
                'allowEmpty' => false,
                'className' => '\\application\\models\\Touragent',
                'attributeName' => 'id'],
            ['minDiscount, maxDiscount, week, year', 'numerical']
        ];
    }

    public function relations()
    {
        return [
            'touragent'=>[self::BELONGS_TO, 'application\\models\\Touragent', 'touragentId'],
        ];
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'touragent_param';
    }
}