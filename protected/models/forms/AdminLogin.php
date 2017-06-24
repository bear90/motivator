<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       10.06.2016
 *
 */
namespace application\models\forms;

use application\models\Entity;
use application\models\defines;

class AdminLogin extends \CFormModel
{
    private $identity;

    public $login;
    public $password;
    public $rememberMe = true;

    public function login() {
        if ($this->identity === null) {
            $this->identity = new \UserIdentity($this->login, $this->password);
            $this->identity->role = defines\UserRole::ADMIN;
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
}