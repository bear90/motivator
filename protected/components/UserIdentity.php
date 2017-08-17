<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
use application\models\entities\User;
use application\models\entities\Code;
use application\models\Entity;
use application\models\entities;
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

    private function hasTouragent($userId) {
        $criteria = new \CDbCriteria();
        $criteria->addCondition('userId = :userId');
        $criteria->addCondition('status = :active');
        $criteria->params = [
            'userId' => $userId,
            'active' => 1
        ];
        return entities\Touragent::model()->exists($criteria);
    }
    
    public function authenticate() {
        $user = User::model()->findByAttributes(array(
            'password' => $this->password
        ));

        if ($user == null || $user->id == 0 || $user->roleId != $this->role || 
            ($this->role == defines\UserRole::MANAGER && !$this->hasTouragent($user->id))) {
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
            'code' => $this->code,
            'deleted' => 0
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