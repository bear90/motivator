<?php

namespace application\models;

class Tourist extends \CActiveRecord{

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
}