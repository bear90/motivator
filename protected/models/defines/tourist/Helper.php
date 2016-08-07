<?php

namespace application\models\defines\tourist;

use application\models\Tourist;
use application\models\TourOffer;
use application\models\TouristTour;
use application\models\Configuration;
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
        $tourist->partnerDiscont = 0;
        $tourist->abonentDiscont = 0;
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
        $tourist = Tourist::model()->findByPk($offer->tour->touristId, ['with' => ['tour']]);

        if($tourist->tour) 
        {
            throw new \Exception("Tour has already been confirmed! You can only change it.");
        } else {
            $touristTour = new TouristTour;

            $prepayment = Configuration::get(Configuration::PREPAYMENT);
            $touristTour->prepayment = round($offer->price * $prepayment / 100, 2);
        }
        $touristTour->attributes = [
            'country' => $offer->country,
            'city' => $offer->city,
            'price' => $offer->price,
            'startDate' => $offer->startDate,
            'endDate' => $offer->endDate,
            'description' => $offer->description,
            'touristId' => $tourist->id,
            'managerId' => $offer->tour->managerId,
            'touragentId' => $offer->tour->touragentId,
            'operatorId' => $offer->operatorId,
        ];
        $touristTour->save();

        if($touristTour->hasErrors()){
            throw new \Exception(\Tool::errorToString($touristTour->errors));
        }
        $tourist->refresh();

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
        $tourist->counterStartedAt = '0000-00-00 00:00:00';
        $tourist->counterDate = '0000-00-00 00:00:00';
        $tourist->save();

        return $tourist;
    }
}