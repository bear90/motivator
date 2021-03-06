<?php

namespace application\models;

use application\models\Tourist;
use application\models\defines;

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
        return Configuration::get(Configuration::SITE_DOMAIN) . "/user/login?hash={$hash}";
    }

    public function findByHash($hash)
    {
        $criteria = new \CDbCriteria();
        $criteria->addCondition('md5(concat(id, :salt)) = :hash');
        $criteria->params = [
            'salt' => $this->salt,
            'hash' => $hash
        ];

        return $this->find($criteria);
    }

    public function markLoginTime()
    {
        if (empty($this->firstLogin))
        {
            $this->firstLogin = new \CDbExpression('now()');
            if ($this->roleId == defines\UserRole::USER)
            {
                \Yii::app()->user->setFlash('firstLogin', true);
                $tourist = Tourist::model()->findByAttributes(['userId' => $this->id]);
                \Tool::informTourist($tourist, 'after_registration');
            }
        }
        $this->lastLogin = new \CDbExpression('now()');
        $this->save();

        if($this->hasErrors()){
            throw new \Exception(\Tool::errorToString($this->errors));
        }
    }
}