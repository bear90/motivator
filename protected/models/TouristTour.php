<?php

namespace application\models;

use application\components\DBEntity;
use application\models\TouragentParam;

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
            $minDiscont = $this->getMinDiscont();
            $maxDiscont = $this->getMaxDiscont();

            $this->minDiscont = round($this->price * $minDiscont / 100, 2);
            $this->maxDiscont = round($this->price * $maxDiscont / 100, 2);
        }
    }

    public function getMaxDiscont()
    {
        $startDate = new \DateTime($this->startDate);
        $endDate = new \DateTime($this->endDate);

        return TouragentParam::getMaxDiscont($startDate, $endDate, $this->touragentId);
    }

    public function getMinDiscont()
    {
        $startDate = new \DateTime($this->startDate);
        $endDate = new \DateTime($this->endDate);

        return TouragentParam::getMinDiscont($startDate, $endDate, $this->touragentId);
    }

    public function getCurrentSurchange()
    {
        return $this->price - $this->minDiscont - $this->prepayment - $this->tourist->abonentDiscont - $this->tourist->partnerDiscont;
    }
}