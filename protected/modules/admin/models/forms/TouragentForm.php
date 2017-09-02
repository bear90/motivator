<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       11.07.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\models\forms;

use application\models\defines\UserRole;
use application\models\entities;

class TouragentForm extends \CFormModel
{
    public $name;
    public $site;
    public $password;
    public $password2;

    public $userId;

    public function rules(){
        return [
            ['password, name, site, password2', 'required', 'on' => 'create'], 
            ['name, site', 'required', 'on' => 'update'], 
            ['password, password2', 'safe', 'on' => 'update'], 
            ['password', 'compare', 
                'allowEmpty' => true,
                'operator' => '==',
                'compareAttribute' => 'password2'
            ],
            ['password', 'length', 
                'allowEmpty' => true,
                'min' => 6
            ],
            /*['password', 'unique',
                'attributeName' => 'password',
                'className' => '\\application\\models\\entities\\User',
                'criteria' => [
                    'condition' => 't.roleId = :managerRole AND (:userId IS NULL OR id != :userId)',
                    'params' => [
                        'managerRole' => UserRole::MANAGER,
                        'userId' => $this->userId
                    ]
                ]
            ],*/
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute){
        $pass = $this->$attribute;
        $criteria = new \CDbCriteria();
        $criteria->addCondition('t.roleId = :managerRole and password = :pass');
        $criteria->params['managerRole'] = UserRole::MANAGER;
        $criteria->params['pass'] = $pass;
        if ($this->userId) {
            $criteria->addCondition('t.id != :userId');
            $criteria->params['userId'] = $this->userId;
        }
        if(entities\User::model()->exists($criteria)) {
            $this->addError($attribute, \Yii::t('front', 'Пароль "{n}" уже занят.', $pass));
        }
    }

    public function attributeLabels(){
        return [
            'name' => 'Наименование',
            'site' => 'Сайт',
            'password' => 'Пароль',
            'password2' => 'Повторите пароль',
        ];
    }
}