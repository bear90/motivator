<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
use application\models\User;
use application\models\Tourist;
use application\models\defines;

class UserIdentity extends CUserIdentity {

    private $role;

    public function setRole($role) {
        $this->role = $role;
    }
    
    public function authenticate() {
        $user = User::model()->findByAttributes(array(
            'password' => $this->password
        ));

        $deleted = false;
        if ($this->role == defines\UserRole::USER && $user !== null)
        {
            $tourist = Tourist::model()->findByAttributes(['userId' => $user->id]);
            $deleted = $tourist && $tourist->deleted == false ? false : true;
        }

        if ($user == null || $user->id == 0 || $user->roleId != $this->role || $deleted) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }
    
    public function authenticateByHash() 
    {
        $user = User::model()->findByHash($this->password);

        $deleted = false;
        if ($this->role == defines\UserRole::USER && $user !== null)
        {
            $tourist = Tourist::model()->findByAttributes(['userId' => $user->id]);
            $deleted = $tourist && $tourist->deleted == false ? false : true;
        }

        if ($user == null || $user->id == 0 || $user->roleId != $this->role || $deleted) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            $this->errorCode = self::ERROR_NONE;
            $this->password = $user->password;
        }

        return !$this->errorCode;
    }

    public function getId() {
        $user = User::model()->findByAttributes(array('password' => $this->password));

        return $user->id;
    }

}