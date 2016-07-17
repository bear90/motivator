<?php

namespace application\models;

class TourCalculator {

    private $price = 0;

    private $tourist = null;

    public function __construct($price, Tourist $tourist = null)
    {
        $this->price = $price;
        $this->tourist = $tourist;
    }

    public function getMaxDiscont(\DateTime $startDate, \DateTime $endDate, $touragentId)
    {
        $maxDiscont = TouragentParam::getMaxDiscont($startDate, $endDate, $touragentId);

        return round($this->price * $maxDiscont / 100, 2);
    }

    public function getMinDiscont(\DateTime $startDate, \DateTime $endDate, $touragentId)
    {
        $minDiscont = TouragentParam::getMinDiscont($startDate, $endDate, $touragentId);

        return round($this->price * $minDiscont / 100, 2);
    }

    public function getPrepayment()
    {
        $prepayment = Configuration::get(Configuration::PREPAYMENT);

        $newPrepayment = round($this->price * $prepayment / 100, 2);

        return $newPrepayment;
    }

    public function getAbonentDiscount($minAbonentDiscount, $maxDiscount) 
    {
        $abonentDiscount = $this->tourist->abonentDiscont;

        if ($abonentDiscount + $minAbonentDiscount > $maxDiscount) 
        {
            $abonentDiscount = $maxDiscount - $minAbonentDiscount;
        }

        return $abonentDiscount;
    }
}