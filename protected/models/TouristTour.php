<?php

namespace application\models;

use application\components\DBEntity;

class TouristTour extends DBEntity
{
    public $minDiscont = 0;
    public $maxDiscont = 0;
    public $surchange = 0;
    
    public function rules(){
        return [
            ['price, startDate, endDate, description, country, city, prepayment', 'required'],
            ['touristId, managerId, touragentId', 'safe']
        ];
    }

    public function relations()
    {
        return [
            'tourist'=>[self::BELONGS_TO, 'application\\models\\Tourist', 'touristId'],
            'manager'=>[self::BELONGS_TO, 'application\\models\\TouragentManager', 'managerId'],
            'touragent'=>[self::BELONGS_TO, 'application\\models\\Touragent', 'touragentId'],
        ];
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'tourist_tour';
    }

    public function afterFind()
    {
        if($this->price)
        {
            $minDiscont = Configuration::get(Configuration::MIN_DISCONT);
            $maxDiscont = Configuration::get(Configuration::MAX_DISCONT);

            $this->minDiscont = round($this->price * $minDiscont / 100);
            $this->maxDiscont = round($this->price * $maxDiscont / 100);
            $this->surchange = $this->price - $this->maxDiscont - $this->prepayment;
        }
    }

    public function getPartnerDiscont()
    {
        return 0;
    }

    public function getCurrentSurchange()
    {
        return $this->price - $this->minDiscont - $this->prepayment - $this->getPartnerDiscont();
    }
}