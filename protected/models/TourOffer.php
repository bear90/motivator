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
            ['price, startDate, endDate, country, city', 'required'],
            ['tourId, description', 'safe']
        ];
    }

    public function relations()
    {
        return [
            'tour'=>[self::BELONGS_TO, 'application\\models\\Tour', 'tourId'],
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
            $minDiscont = Configuration::get(Configuration::MIN_DISCONT);
            $maxDiscont = Configuration::get(Configuration::MAX_DISCONT);
            $prepayment = Configuration::get(Configuration::PREPAYMENT);

            $this->minDiscont = round($this->price * $minDiscont / 100);
            $this->maxDiscont = round($this->price * $maxDiscont / 100);
            $this->prepayment = round($this->price * $prepayment / 100);
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