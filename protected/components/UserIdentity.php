<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
use application\models\entities\User;
use application\models\entities\Code;
use application\models\Entity;
use application\models\defines;

class UserIdentity extends CUserIdentity {

    private $role;
    private $code;

    public function setRole($role) {
        $this->role = $role;
    }

    public function setCode($code) {
        $this->code = $code;
    }
    
    public function authenticate() {
        $user = User::model()->findByAttributes(array(
            'password' => $this->password
        ));

        if ($user == null || $user->id == 0 || $user->roleId != $this->role) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }
    
    public function authenticateByCode() {
        $user = User::model()->findByAttributes(array(
            'password' => $this->password,
        ));
        $code = Code::model()->findByAttributes([
            'code' => $this->code
        ]);

        if ($user == null || $user->id == 0 || $user->roleId != $this->role || $code == null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }
    
    public function authenticateByHash() 
    {
        $user = Entity\User\Repository::findByHash($this->password);

        if ($user == null || $user->id == 0 || $user->roleId != $this->role) {
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