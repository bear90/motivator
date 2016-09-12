<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\models;

use application\models\Configuration;
use application\components\DBEntity;

class TouragentManager extends DBEntity {

    public function rules(){
        return [
            ['name', 'required'],
            ['touragentId, description, boss', 'safe'],
            ['bonusFactor', 'type', 'type' => 'float'],
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
                'on' => 'tourists2.deleted = 0',
                'order' =>  'tourists2.createdAt'],
            'touristsGettingDiscount'  => [self::HAS_MANY, 'application\\models\\Tourist', 'touristId',
                'through'   => 'tourist_tour',
                'condition' => 'touristsGettingDiscount.statusId = :status',
                'order'     => 'touristsGettingDiscount.counterDate',
                'params'    => ['status' => defines\TouristStatus::GETTING_DISCONT]
            ],
            'touristsHavingDiscount'  => [self::HAS_MANY, 'application\\models\\Tourist', 'touristId',
                'through'   => 'tourist_tour',
                'condition' => 'touristsHavingDiscount.statusId = :status and touristsHavingDiscount.deleted=0',
                'order'     => 'touristsHavingDiscount.tourFinishAt',
                'params'    => ['status' => defines\TouristStatus::HAVE_DISCONT]
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
            return $tourist->statusId == defines\TouristStatus::WANT_DISCONT;
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

    public function addBonusByPrice($price)
    {
        $price = (float) $price;
        $percent = 0;
        if ($this->bonusFactor)
        {
            $percent = $this->bonusFactor;
        }

        $this->bonus = $percent * $price / 100;
        $this->save();
    }
}