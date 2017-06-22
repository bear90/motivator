<?php

/**
 * @author soza.mihail@gmail.com
 */
namespace application\models\forms;

class UserLogin extends \CFormModel
{
    private $identity;

    public $submit;
    public $password;
    public $code;
    public $rememberMe = true;
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
            \Yii::app()->user->model->markLoginTime();

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
            \Yii::app()->user->model->markLoginTime();

            return true;
        } else {
            return false;
        }
    }
}