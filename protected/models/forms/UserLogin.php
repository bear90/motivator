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
    public $rememberMe = true;

    public function login() {
        if ($this->identity === null) {
            $this->identity = new \UserIdentity('', $this->password);
            $this->identity->authenticate();
        }

        if ($this->identity->errorCode === \UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            \Yii::app()->user->login($this->identity, $duration);

            return true;
        } else {
            return false;
        }
    }
}