<?php

namespace application\models\defines\tourist;

use application\models\Tourist;
use application\models\defines\TouristStatus;
use application\models\defines\UserRole;
use application\models\defines\user\Helper as UserHelper;

class Helper {
    
    public function create(array $data)
    {
        // create user
        $userHelper = new UserHelper;
        $pass = UserHelper::generatePassword();
        $user = $userHelper->create($pass, UserRole::USER);
        // Create Tourist
        $tourist = new Tourist;
        $tourist->attributes = $data;
        $tourist->statusId = TouristStatus::WANT_DISCONT;
        $tourist->userId = $user->id;
        $tourist->save();

        if($tourist->hasErrors()){
            throw new \Exception(\Tool::errorToString($tourist->errors));
        }

        return $tourist;
    }
}