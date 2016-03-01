<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
use application\models\User;

class UserIdentity extends CUserIdentity {
    
    public function authenticate() {
        $user = User::model()->findByAttributes(array('password' => $this->password));

        if ($user == null || $user->id == 0) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }

    public function getId() {
        $user = User::model()->findByAttributes(array('password' => $this->password));

        return $user->id;
    }

}