<?php

namespace application\models;

class UserRole extends \CActiveRecord{

    public function rules(){
        return [
            ['name', 'required']
        ];
    }

    public function relations()
    {
        return [
            'users'=>[self::HAS_MANY, 'application\\models\\User', 'roleId'],
        ];
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'user_roles';
    }
}