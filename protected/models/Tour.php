<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\models;

use application\components\DBEntity;

class Tour extends DBEntity {

    public function rules(){
        return [
            ['startDate, endDate', 'required'],
            ['touristId, touragentId, offer, managerId', 'safe']
        ];
    }

    public function relations()
    {
        return [
            'tourist'=>[self::BELONGS_TO, 'application\\models\\Tourist', 'touristId'],
            'touragent'=>[self::BELONGS_TO, 'application\\models\\Touragent', 'touragentId'],
            'cities'=>[self::HAS_MANY, 'application\\models\\TourCity', 'tourId'],
            'offers'=>[self::HAS_MANY, 'application\\models\\TourOffer', 'tourId'],
        ];
    }

    public function tableName()
    {
        return 'tours';
    }

    public function getCities($asString = true)
    {
        $cities = array_map(function($city){
            return $city->city;
        },$this->cities);

        return $asString ? implode(', ', $cities) : $cities;
    }
}