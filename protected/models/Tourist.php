<?php

namespace application\models;

use application\components\DBEntity;
use application\models\defines\TouristStatus;

class Tourist extends DBEntity {

    public function rules(){
        return [
            ['firstName, lastName, email, userId, statusId', 'required'],
            ['middleName, phone, groupCode, offerId, counterReason, counterDate, counterStartedAt, tourFinishAt', 'safe']
        ];
    }

    public function relations()
    {
        return [
            'status'=>[self::BELONGS_TO, 'application\\models\\TouristStatus', 'statusId'],
            'user'=>[self::BELONGS_TO, 'application\\models\\User', 'userId'],
            'offer'=>[self::BELONGS_TO, 'application\\models\\TourOffer', 'offerId'],
            'tours'=>[self::HAS_MANY, 'application\\models\\Tour', 'touristId'],
            'message'=>[self::HAS_ONE, 'application\\models\\Message', 'touristId', 'order' => 'message.createdAt DESC'],
        ];
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'tourists';
    }

    public function getTimer1($format = 'Y-m-d H:i:s')
    {
        $days = Configuration::get(Configuration::ORDER_TOUR_TIMER, 1);

        $date = new \DateTime($this->createdAt);
        $date->add(new \DateInterval("P{$days}D"));
        
        return $date->format($format);
    }

    public function getTimer2($format = 'Y-m-d H:i:s')
    {
        $days = Configuration::get(Configuration::PAYMENT_TOUR_TIMER, 1);

        $date = new \DateTime($this->createdAt);
        $date->add(new \DateInterval("P{$days}D"));
        
        return $date->format($format);
    }

    public function getCounterDate($format = 'Y-m-d H:i:s')
    {
        if($this->statusId == TouristStatus::WANT_DISCONT)
        {
            return $this->getTimer1($format);
        }

        if($this->counterDate == '0000-00-00 00:00:00')
        {
            return null;
        }

        $date = new \DateTime($this->counterDate);
        
        return $date->format($format);
    }

    public function getFullName()
    {
        return trim("{$this->lastName} {$this->firstName} {$this->middleName}");
    }

    public function getFormatedPhone()
    {
        return preg_replace('/(\+375)(\d{2})(\d{2})(\d{2})(\d{3})/', '$1 ($2) $3 $4 $5', $this->phone);
    }

    public function hasTouragent($touragentId)
    {
        foreach ($this->tours as $tour) {
            if ($tour->touragentId == $touragentId) 
            {
                return true;
            }
        }
        return false;
    }

    public function hasManager()
    {
        return $this->statusId >= TouristStatus::GETTING_DISCONT;
    }

    public function getManager()
    {
        if($this->hasManager())
        {
            return $this->offer->tour->manager;
        }

        return null;
    }

    public function getTotalDiscont()
    {
        $discont = 0;
        if($this->offer)
        {
            $discont += $this->offer->minDiscont;
            $discont += $this->offer->getPartnerDiscont();
        }
        return $discont;
    }
}