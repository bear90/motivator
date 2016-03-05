<?php

namespace application\models;

use application\components\DBEntity;

class Tourist extends DBEntity {

    public function rules(){
        return [
            ['firstName, lastName, email, userId, statusId', 'required'],
            ['middleName, phone, tourCity, groupCode', 'safe']
        ];
    }

    public function relations()
    {
        return [
            'status'=>[self::BELONGS_TO, 'application\\models\\TouristStatus', 'statusId'],
            'user'=>[self::BELONGS_TO, 'application\\models\\User', 'userId'],
        ];
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'tourists';
    }

    public function getTimer1($format = 'Y-m-d H:i:s')
    {
        $days = Configuration::get(Configuration::ORDER_TOUR_TIMER, 1);

        $date = new \DateTime($this->createdAt);
        $date->add(new \DateInterval("P{$days}D"));
        
        return $date->format($format);
    }
}