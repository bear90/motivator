<?php

namespace application\models;

use application\components\DBEntity;
use application\models\Configuration;

class TouragentParam extends DBEntity
{
    
    public function rules(){
        return [
            ['touragentId', 'exist', 
                'allowEmpty' => false,
                'className' => '\\application\\models\\Touragent',
                'attributeName' => 'id'],
            ['minDiscount, maxDiscount, week, year', 'numerical']
        ];
    }

    public function relations()
    {
        return [
            'touragent'=>[self::BELONGS_TO, 'application\\models\\Touragent', 'touragentId'],
        ];
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'touragent_param';
    }

    public static function getMaxDiscont(\DateTime $startDate, \DateTime $endDate, $touragentId)
    {
        $default = Configuration::get(Configuration::MAX_DISCONT);
        $discounts = [];
        foreach ([$startDate, $endDate] as $date) {
            $week = $date->format("W");
            if ($week > 51 && $date->format("m") == 1)
            {
                $week = 1;
            }
            $year = $date->format("Y");
            $entity = self::model()->findByAttributes([
                    'touragentId' => $touragentId,
                    'week' => $week,
                    'year' => $year,
                ]);

            if (is_null($entity))
            {
                break;
            }
            $discounts[] = intval($entity->maxDiscount);
        }

        if (count($discounts) == 2)
        {
            return min($discounts);
        } 
        else 
        {
            return $default;
        }
    }

    public static function getMinDiscont(\DateTime $startDate, \DateTime $endDate, $touragentId)
    {
        $default = Configuration::get(Configuration::MIN_DISCONT);
        $discounts = [];
        foreach ([$startDate, $endDate] as $date) {
            $week = $date->format("W");
            if ($week > 51 && $date->format("m") == 1)
            {
                $week = 1;
            }

            $year = $date->format("Y");
            $entity = self::model()->findByAttributes([
                    'touragentId' => $touragentId,
                    'week' => $week,
                    'year' => $year,
                ]);

            if (is_null($entity))
            {
                break;
            }
            $discounts[] = intval($entity->minDiscount);
        }

        if (count($discounts) == 2)
        {
            return min($discounts);
        } 
        else 
        {
            return $default;
        }
    }
}