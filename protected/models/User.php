<?php

namespace application\models;

class User extends \CActiveRecord{

    public function rules(){
        return [
            ['password, roleId', 'required']
        ];
    }

    public function relations()
    {
        return [
            'tourist'=>[self::HAS_ONE, 'application\\models\\Tourist', 'userId'],
            'role'=>[self::BELONGS_TO, 'application\\models\\UserRole', 'roleId'],
        ];
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'users';
    }
}