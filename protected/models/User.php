<?php

namespace application\models;

class User extends \CActiveRecord{

    private $salt = 'SaLtaSd';

    public function rules(){
        return [
            ['password, roleId', 'required']
        ];
    }

    public function relations()
    {
        return [
            'tourist'=>[self::HAS_ONE, 'application\\models\\Tourist', 'userId'],
            'touragent'=>[self::HAS_ONE, 'application\\models\\Touragent', 'userId'],
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

    public function getAutoLoginLink()
    {
        $hash = md5($this->id . $this->salt);
        return "http://мотиватор.бел/user/login?hash={$hash}";
    }
}