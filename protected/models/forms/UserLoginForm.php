<?php

/**
 * @author soza.mihail@gmail.com
 */
namespace application\models\forms;
use application\models\Entity;
use application\models\defines;

class UserLoginForm extends \CFormModel
{
    private $identity;

    public $password;
    public $rememberMe = false;
    public $hash;

    public function login($role) {
        if ($this->identity === null) {
            $this->identity = new \UserIdentity('', $this->password);
            $this->identity->role = $role;
            $this->identity->authenticate();
        }

        if ($this->identity->errorCode === \UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            \Yii::app()->user->login($this->identity, $duration);
            $user = new Entity\User(\Yii::app()->user->model);
            $user->markLoginTime();

            return true;
        } else {
            return false;
        }
    }

    public function loginByHash($role, $hash) {
        if ($this->identity === null) {
            $this->identity = new \UserIdentity('', $hash);
            $this->identity->role = $role;
            $this->identity->authenticateByHash();
        }

        if ($this->identity->errorCode === \UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            \Yii::app()->user->login($this->identity, $duration);
            $user = new Entity\User(\Yii::app()->user->model);
            $user->markLoginTime();

            return true;
        } else {
            return false;
        }
    }
}