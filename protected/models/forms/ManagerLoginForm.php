<?php

/**
 * @author soza.mihail@gmail.com
 */
namespace application\models\forms;
use application\models\Entity;
use application\models\defines;

class ManagerLoginForm extends \CFormModel
{
    private $identity;

    public $submit;
    public $password;
    public $code;
    public $rememberMe = true;
    public $hash;

    public function loginWithoutCode() {
        if ($this->identity === null) {
            $this->identity = new \UserIdentity('', $this->password);
            $this->identity->role = defines\UserRole::MANAGER;
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

    public function loginWithCode() {
        if ($this->identity === null) {
            $this->identity = new \UserIdentity('', $this->password);
            $this->identity->role = defines\UserRole::MANAGER;
            $this->identity->code = $this->code;
            $this->identity->authenticateByCode();
        }

        if ($this->identity->errorCode === \UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            \Yii::app()->user->login($this->identity, $duration);
            \Yii::app()->user->setState('code', $this->code);
            $user = new Entity\User(\Yii::app()->user->model);
            $user->markLoginTime();

            return true;
        }

        return false;
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