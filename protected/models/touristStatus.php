<?php

namespace application\models;

class TouristStatus extends \CActiveRecord {

    public function rules(){
        return [
            ['name, description', 'required']
        ];
    }

    public function relations()
    {
        return [
            'tourists'=>[self::HAS_MANY, 'application\\models\\Tourist', 'statusId'],
        ];
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'tourist_statuses';
    }
}