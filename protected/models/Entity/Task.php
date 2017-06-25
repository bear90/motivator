<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       06.06.2017
 * @package
 * @copyright   Copyright (c) 2015-2017 soXes GmBh.
 *
 */

namespace application\models\Entity;
use application\models\Tools;
use application\models\entities;
use application\models\defines;

class Task
{

    private $data = null;

    public function __construct(entities\Task $entity = null)
    {
        if (is_null($entity)) {
            $entity = new entities\Task();
        }
        $this->data = $entity;
    }

    public function data()
    {
        return $this->data;
    }

    public function save(array $attributes = [])
    {
        if ($attributes) {
            $this->data->attributes = $attributes;
        }
        $this->data->save();

        if ($this->data->hasErrors()) {
            throw new \Exception (Tools::errorsToString($this->data->getErrors()));
        }

        return true;
    }

    public function attachCountries(array $items)
    {
        if (count($items)) {
            foreach ($items as $value) {
                $entity = new entities\TaskCountry();
                $entity->taskId = $this->data->id;
                $entity->countryId = $value;
                $entity->save();

                if ($entity->hasErrors()) {
                    throw new \Exception (Tools::errorsToString($entity->getErrors()));
                }
            }
        }

        return true;
    }

    public function attachCildAgies(array $items)
    {
        if (count($items)) {
            foreach ($items as $value) {
                $entity = new entities\TaskChildAge();
                $entity->taskId = $this->data->id;
                $entity->age = $value;
                $entity->save();

                if ($entity->hasErrors()) {
                    throw new \Exception (Tools::errorsToString($entity->getErrors()));
                }
            }
        }

        return true;
    }

    public function createdAt($format='d.m.Y')
    {
        $createdAt = new \DateTime($this->data->createdAt);
        return $createdAt->format($format);
    }

    public function startedAt($format='d.m.Y')
    {
        $startedAt = new \DateTime($this->data->startedAt);
        return $startedAt->format($format);
    }

    public function getCountryOptions()
    {
        $list = $this->data->countries;
        $list = \CHtml::listData($list, 'id', 'name');

        return $list;
    }

    public function setPrice($type, $price)
    {
        $price = floatval($price);
        switch ($type) {
            case defines\Offer\PriceType::GENERAL:
                if (is_null($this->data->generalPrice) || floatval($this->data->generalPrice) > $price) {
                    $this->data->generalPrice = $price;
                    $this->save();
                }
                break;
            
            case defines\Offer\PriceType::EARLY_BOOKING:
                if (is_null($this->data->earlyPrice) || floatval($this->data->earlyPrice) > $price) {
                    $this->data->earlyPrice = $price;
                    $this->save();
                }
                break;
            
            case defines\Offer\PriceType::LASTMINUTE_TOUR:
                if (is_null($this->data->lastMinPrice) || floatval($this->data->lastMinPrice) > $price) {
                    $this->data->lastMinPrice = $price;
                    $this->save();
                }
                break;
        }
    }
}
