<?php

namespace application\models\defines\user;

use application\models\defines\UserRole;
use application\models\User;

class Helper {


    public function create($password, $role) {

        if (in_array($role, UserRole::getList()) === false){
            throw new Exception("Incorrect User Role");
        }

        $user = new User;
        $user->password = $password;
        $user->roleId = $role;
        $user->save();

        if($user->hasErrors()){
            throw new \Exception(\Tool::errorToString($user->errors));
        }

        return $user;
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
        } while (User::model()->exists('password = :pass', ['pass' => $password]));
        

        return $password;
    }
}