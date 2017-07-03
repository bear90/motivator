<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       06.06.2017
 * @package
 * @copyright   Copyright (c) 2015-2017 soXes GmBh.
 *
 */

namespace application\models\Entity;
use application\models\Tools;
use application\models\entities;
use application\models\defines;
use application\models\entities\Configuration;

class User
{

    private $data = null;

    public function __construct(entities\User $entity = null)
    {
        if (is_null($entity)) {
            $entity = new entities\User();
        }
        $this->data = $entity;
    }

    public function data()
    {
        return $this->data;
    }

    public function save(array $attributes = [])
    {
        if ($attributes) {
            $this->data->attributes = $attributes;
        }
        $this->data->save();

        if ($this->data->hasErrors()) {
            throw new \Exception (Tools::errorsToString($this->data->getErrors()));
        }

        return true;
    }

    public function getAutoLoginLink()
    {
        $hash = md5($this->data->id . $this->data->salt());
        return Configuration::get(Configuration::SITE_DOMAIN) . "/user/login?hash={$hash}";
    }

    public function markLoginTime()
    {
        if (empty($this->data->firstLogin))
        {
            $this->data->firstLogin = new \CDbExpression('now()');
            if ($this->data->roleId == defines\UserRole::USER)
            {
                \Yii::app()->user->setFlash('firstLogin', true);
            }
        }
        $this->data->lastLogin = new \CDbExpression('now()');
        $this->save();
    }

    public static function generatePassword($length = 6)
    {
        $generate = function($length){
            $password = '';
            for ($i=0; $i<$length; $i++){
                $password .= rand(0, 9);
            }
            return $password;
        };

        // get unical password
        do {
            $password = $generate($length);
        } while (entities\User::model()->exists('password = :pass', ['pass' => $password]));
        

        return $password;
    }

    public function create($password, $role) {

        if (in_array($role, defines\UserRole::getList()) === false){
            throw new Exception("Incorrect User Role");
        }

        $this->save(['password' => $password, 'roleId' => $role]);

        return $this;
    }
}
