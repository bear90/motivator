<?php

namespace application\models;

use application\components\DBEntity;

class TouristTour extends DBEntity
{
    public $minDiscont = 0;
    public $maxDiscont = 0;
    
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
        }
    }

    public function getPartnerDiscont()
    {
        return 0;
    }

    public function getCurrentSurchange()
    {
        return $this->price - $this->minDiscont - $this->prepayment - $this->tourist->abonentDiscont - $this->tourist->partnerDiscont;
    }

    public function getNewPriceText() 
    {
        $price = strval(round($this->price/10000, 2));
        $tmp = explode('.', $price);
        $rub = $tmp[0];
        $kop = strlen($tmp[1]) == 1 ? $tmp[1] . '0' : $tmp[1] ;
        return number_format($rub, 0, ',', ' ') . ' руб. ' . $kop . ' коп.';
    }

    public function getNewPrice()
    {
        return round($this->price/10000, 2);
    }
}