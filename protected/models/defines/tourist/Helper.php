<?php

namespace application\models\defines\tourist;

use application\models\Tourist;
use application\models\TourOffer;
use application\models\defines\TouristStatus;
use application\models\defines\UserRole;
use application\models\defines\user\Helper as UserHelper;

class Helper {
    
    public function create(array $data)
    {
        // create user
        $userHelper = new UserHelper();
        $pass = UserHelper::generatePassword();
        $user = $userHelper->create($pass, UserRole::USER);
        // Create Tourist
        $tourist = new Tourist();
        $tourist->attributes = $data;
        $tourist->statusId = TouristStatus::WANT_DISCONT;
        $tourist->userId = $user->id;
        $tourist->save();

        if($tourist->hasErrors()){
            throw new \Exception(\Tool::errorToString($tourist->errors));
        }

        return $tourist;
    }

    public function update($id, array $data)
    {
        $tourist = Tourist::model()->findByPk($id);
        $tourist->attributes = $data;
        $tourist->save();

        if($tourist->hasErrors()){
            throw new \Exception(\Tool::errorToString($tourist->errors));
        }

        return $tourist;
    }

    public function confirmOffer(TourOffer $offer)
    {
        $tourist = Tourist::model()->findByPk($offer->tour->touristId);
        $tourist->offerId = $offer->id;
        $tourist->save();

        return $tourist;
    }

    public function changeStatus(Tourist $tourist, $status)
    {
        $tourist->statusId = $status;
        $tourist->save();

        return $tourist;
    }

    public function resetTimer(Tourist $tourist)
    {
        $tourist->counterReason = '0';
        $tourist->counterDate = '0000-00-00 00:00:00';
        $tourist->save();

        return $tourist;
    }
}