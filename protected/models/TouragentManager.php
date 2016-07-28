<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\models;

use application\components\DBEntity;
use application\models\defines\TouristStatus;

class TouragentManager extends DBEntity {

    public function rules(){
        return [
            ['name', 'required'],
            ['touragentId', 'safe']
        ];
    }

    public function relations()
    {
        return [
            'touragent' => [self::BELONGS_TO, 'application\\models\\Touragent', 'touragentId'],
            'tours'     => [self::HAS_MANY, 'application\\models\\Tour', 'managerId'],
            'tourist_tour' => [self::HAS_MANY, 'application\\models\\TouristTour', 'managerId'],
            'tourists'  => [self::HAS_MANY, 'application\\models\\Tourist', 'touristId', 
                'through' => 'tours',
                'order' =>  'tourists.createdAt'],
            'tourists2'  => [self::HAS_MANY, 'application\\models\\Tourist', 'touristId', 
                'through' => 'tourist_tour',
                'order' =>  'tourists2.createdAt'],
            'touristsGettingDiscount'  => [self::HAS_MANY, 'application\\models\\Tourist', 'touristId',
                'through'   => 'tourist_tour',
                'condition' => 'touristsGettingDiscount.statusId = :status',
                'order'     => 'touristsGettingDiscount.counterDate',
                'params'    => ['status' => TouristStatus::GETTING_DISCONT]
            ],
            'touristsHavingDiscount'  => [self::HAS_MANY, 'application\\models\\Tourist', 'touristId',
                'through'   => 'tourist_tour',
                'condition' => 'touristsHavingDiscount.statusId = :status',
                'order'     => 'touristsHavingDiscount.tourFinishAt',
                'params'    => ['status' => TouristStatus::HAVE_DISCONT]
            ],
            'phones'    => [self::HAS_MANY, 'application\\models\\TouragentManagerPhone', 'managerId']
        ];
    }

    public function tableName()
    {
        return 'touragent_managers';
    }

    public function getWantDiscont()
    {
        $tourists = $this->boss ? $this->touragent->tourists : $this->tourists;
        return array_filter($tourists, function($tourist){
            return $tourist->statusId == \application\models\defines\TouristStatus::WANT_DISCONT;
        });
    }

    public function getGettingDiscount()
    {
        return $this->boss ? $this->touragent->touristsGettingDiscount : $this->touristsGettingDiscount;
    }

    public function getHaveDiscount()
    {
        return $this->boss ? $this->touragent->touristsHavingDiscount : $this->touristsHavingDiscount;
    }

    public function getPhones($asString = true)
    {
        $this->refresh();
        $phones = array_map(function($phone){
            return $phone->phone;
        }, $this->phones);

        return $asString ? implode(', ', $phones) : $phones;
    }
}