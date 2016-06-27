<?php

namespace application\models;

use application\components\DBEntity;

class TouragentParam extends DBEntity
{

    public $week = 0;
    
    public function rules(){
        return [
            ['touragentId', 'exist', 
                'allowEmpty' => false,
                'className' => '\\application\\models\\Touragent',
                'attributeName' => 'id'],
            ['date', 'date', 
                'allowEmpty' => false,
                'format' => 'yyyy-MM-dd HH:mm:ss'],
            ['minDiscount, maxDiscount', 'numerical']
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

    public function afterFind()
    {
        if($this->date)
        {
            $this->week = date('W', strtotime($this->date));
        }
    }
 
    public function tableName()
    {
        return 'touragent_param';
    }
}