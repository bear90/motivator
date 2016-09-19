<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\models;

use application\components\DBEntity;

class TourOffer extends DBEntity {

    public $minDiscont = 0;
    public $maxDiscont = 0;
    public $surchange = 0;
    public $prepayment = 0;

    public function rules(){
        return [
            ['price, startDate, endDate, paymentEndDate', 'required'],
            ['tourId, description, operatorId, currencyUnit, bookingEndDate', 'safe'],
            ['currency, bookingPrepayment', 'type', 'type' => 'float']
        ];
    }

    public function relations()
    {
        return [
            'tour'=>[self::BELONGS_TO, 'application\\models\\Tour', 'tourId'],
            'operator'=>[self::BELONGS_TO, 'application\\models\\Touroperator', 'operatorId'],
        ];
    }

    public function tableName()
    {
        return 'tour_offer';
    }

    public function afterFind()
    {
        if($this->price)
        {
            $minDiscont = $this->getMinDiscont();
            $maxDiscont = $this->getMaxDiscont();
            $prepayment = Configuration::get(Configuration::PREPAYMENT);

            $this->minDiscont = round($this->price * $minDiscont / 100, 2);
            $this->maxDiscont = round($this->price * $maxDiscont / 100, 2);
            $this->prepayment = round($this->price * $prepayment / 100, 2);
            $this->surchange = $this->price - $this->maxDiscont - $this->prepayment - $this->getBookingPrepayment();
        }
    }

    public function getMaxDiscont()
    {
        $startDate = new \DateTime($this->startDate);
        $endDate = new \DateTime($this->endDate);

        return TouragentParam::getMaxDiscont($startDate, $endDate, $this->tour->touragentId);
    }

    public function getMinDiscont()
    {
        $startDate = new \DateTime($this->startDate);
        $endDate = new \DateTime($this->endDate);

        return TouragentParam::getMinDiscont($startDate, $endDate, $this->tour->touragentId);
    }

    public function getPartnerDiscont()
    {
        return 0;
    }

    public function getCurrentSurchange()
    {
        return $this->price - $this->minDiscont - $this->prepayment - $this->getPartnerDiscont();
    }

    public function getCurrentPrice()
    {
        return $this->tour->touragent->getBynPrice($this->currency, $this->currencyUnit);
    }

    public function getBookingPrepayment()
    {
        return $this->tour->touragent->getBynPrice($this->bookingPrepayment, $this->currencyUnit);
    }
}