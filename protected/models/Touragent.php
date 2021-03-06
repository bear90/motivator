<?php

namespace application\models;

use application\components\DBEntity;
use application\models\defines\TouristStatus;
use application\models\Configuration;
use application\models\Currency;

class Touragent extends DBEntity {

    public function rules(){
        return [
            ['name', 'required'],
            ['site, address', 'safe'],
            ['currencyFactor', 'type', 'type' => 'float'],
            ['currencyFactorEur, currencyFactorUsd', 'type', 'type' => 'float']
        ];
    }

    public function relations()
    {
        return [
            'user'      => [self::BELONGS_TO, 'application\\models\\User', 'userId'],
            'managers'  => [self::HAS_MANY, 'application\\models\\TouragentManager', 'touragentId'],
            'tours'     => [self::HAS_MANY, 'application\\models\\Tour', 'touragentId'],
            'tourist_tour' => [self::HAS_MANY, 'application\\models\\TouristTour', 'touragentId'],
            'tourists'  => [self::HAS_MANY, 'application\\models\\Tourist', 'touristId', 
                'through' => 'tours',
                'order' =>  'tourists.createdAt'],
            'tourists2'  => [self::HAS_MANY, 'application\\models\\Tourist', 'touristId', 
                'through' => 'tourist_tour',
                'on' => 'tourists2.deleted = 0',
                'order' =>  'tourists2.createdAt'],
            'touristsGettingDiscount' => [self::HAS_MANY, 'application\\models\\Tourist', 'touristId',
                'through'   => 'tourist_tour',
                'condition' => 'touristsGettingDiscount.statusId = :status',
                'order'     => 'touristsGettingDiscount.counterDate',
                'params'    => ['status' => TouristStatus::GETTING_DISCONT]
            ],
            'touristsHavingDiscount' => [self::HAS_MANY, 'application\\models\\Tourist', 'touristId',
                'through'   => 'tourist_tour',
                'condition' => 'touristsHavingDiscount.statusId = :status and touristsHavingDiscount.deleted=0',
                'order'     => 'touristsHavingDiscount.tourFinishAt',
                'params'    => ['status' => TouristStatus::HAVE_DISCONT]
            ],
            'touroperatorLinks' => [self::HAS_MANY, 'application\\models\\TouragentOperator', 'touragentId'],
            'touroperators'  => [self::HAS_MANY, 'application\\models\\Touroperator', 'touroperatorId', 
                'through' => 'touroperatorLinks'],
        ];
    }
 
    public function tableName()
    {
        return 'touragents';
    }

    public function calculateDelta()
    {
        $delta = 0;
        if (count($this->tourist_tour)==0)
        {
            return $delta;
        }

        $prepayment = $totalPrice = $totalSurchange = 0;
        foreach ($this->tourist_tour as $tour) {
            $totalPrice += $tour->price;
            $surchange = $tour->getCurrentSurchange();
            $prepayment += $tour->prepayment;
            $totalSurchange += $surchange;
        }
        $totalSurchange += -1 * $this->account + $prepayment;

        return round($totalSurchange / $totalPrice * 100, 2);
    }

    public static function getOptions()
    {
        static $list;

        if (!isset($list))
        {
            $list = self::model()->findAll(['condition' => 'status = 1']);
            $list = \CHtml::listData($list, 'id', 'name');
            $list = \CMap::mergeArray(['' => 'Выберите турагента'], $list);
        }

        return $list;
    }

    public static function getSiteOptions()
    {
        static $list;

        if (!isset($list))
        {
            $list = self::model()->findAll(['condition' => 'status = 1']);
            $list = \CHtml::listData($list, 'site', 'name');
            $list = \CMap::mergeArray(['' => 'Выберите турагента'], $list);
        }

        return $list;
    }

    public function getManager($id)
    {
        foreach ($this->managers as $manager) {
            if ($manager->id == $id)
            {
                return $manager;
            }
        }

        return null;
    }

    public function getSiteName()
    {
        $name = $this->site;

        switch (true) {
            case strpos($this->site, 'https://') !== false:
                $name = substr($this->site, 8);
                break;

            case strpos($this->site, 'http://') !== false:
                $name = substr($this->site, 7);
                break;
        }
        $name = rtrim($name, '/');

        return $name;
    }

    public function getSiteLink()
    {
        $link = $this->site;

        if (strpos($link, 'https://') === false && strpos($link, 'http://') === false)
        {
            $link = 'http://' . $link;
        }

        $link = rtrim($link, '/') . '/';

        return $link;
    }

    public function getStorage() {
        return \Yii::getPathOfAlias('webroot') . '/upload/' . $this->id;
    }

    public function getLogoSrc() {
        return Configuration::get(Configuration::SITE_DOMAIN) . '/upload/' . $this->id . '/' . $this->logo;
    }

    public function getOperatorList() 
    {
        $list = $this->touroperators;
        $list = \CHtml::listData($list, 'id', 'name');
        $list = \CMap::mergeArray(['' => "Выберите туроператора"], $list);
        
        return $list;
    }

    public static function getList() 
    {
        $list = self::model()->options()->findAll();
        $list = \CHtml::listData($list, 'id', 'name');
        
        return $list;
    }

    public function getBynPrice($price, $currencyUnit)
    {
        $price = (float) $price;
        $currencyUnit = (string) $currencyUnit;

        switch ($currencyUnit) {
            case 'usd':
                $currencyEntity = Currency::get($currencyUnit);
                $rate = $currencyEntity->value;

                return $price * $this->currencyFactorUsd * $rate;

            case 'eur':
                $currencyEntity = Currency::get($currencyUnit);
                $rate = $currencyEntity->value;

                return $price * $this->currencyFactorEur * $rate;
            
            default:
                return $price;
        }
    }
}