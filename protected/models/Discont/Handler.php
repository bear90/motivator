<?php

namespace application\models\Discont;

use application\models\Configuration;
use application\models\Tourist;
use application\models\Touragent;
use application\models\DiscountTransaction;
use application\models\Logs;
use application\models\defines\TouristStatus;

/**
* 
*/
class Handler
{
    private $tourists = [
        'before' => [],
        'after' => [],
        'beforeFond' => 0,
        'afterFond' => 0
    ];

    public function increaseTouristAbonentDiscont(Tourist $tourist, $prepayment)
    {
        $abonentDiscount = $tourist->abonentDiscont + $prepayment;

        $maxDiscont = $tourist->tour->maxDiscont;
        if ($abonentDiscount + $tourist->tour->minDiscont > $maxDiscont)
        {
            $balance = ($abonentDiscount + $tourist->tour->minDiscont) - $maxDiscont;
            $this->updateTourAgentAccount($tourist, $balance);

            $abonentDiscount = $maxDiscont - $tourist->tour->minDiscont;
        }
        if ($tourist->abonentDiscont != $abonentDiscount)
        {
            $ammount = $abonentDiscount - $tourist->abonentDiscont;
            $tourist->abonentDiscont = $abonentDiscount;
            $tourist->save();
            DiscountTransaction::addAbonentDiscont($tourist, $tourist, $ammount);
        }
    }

    private function processTouristFond(Tourist $tourist, $prepayment)
    {
        $tourAgentId = $tourist->tour->touragentId;
        $tourAgent = Touragent::model()->findByPk($tourAgentId);

        $account = $tourAgent->account + $prepayment;

        if ($account < 0)
        {
            $amount = $account - $tourAgent->account;
            $tourAgent->account = $account;
            $tourAgent->save();

            DiscountTransaction::addTouragentAccount($tourist, $tourAgentId, $amount);

            return 0;
        }
        
        if ($tourAgent->account) 
        {
            $amount = 0 - $tourAgent->account;
            $tourAgent->account = 0;
            $tourAgent->save();

            DiscountTransaction::addTouragentAccount($tourist, $tourAgentId, $amount);
        }

        return $account;
    }

    private function processTouristPrepayment(Tourist $tourist, $prepayment)
    {
        if (empty($prepayment))
        {
            return 0;
        }

        $tourists = $this->getTouristsToChange($tourist->tour->touragentId, $tourist->id);

        if(count($tourists) > 0)
        {
            $part = round($prepayment / count($tourists), 2);
            $prepayment = 0;

            foreach ($tourists as $_tourist) {
                $this
                    ->addBeforeTourist(clone $_tourist)
                    ->addAfterTourist($_tourist);

                $maxDiscount = $_tourist->tour->maxDiscont;
                $abonentDiscount = $_tourist->abonentDiscont + $part;
                if ($abonentDiscount + $_tourist->tour->minDiscont > $maxDiscount)
                {
                    $prepayment += ($abonentDiscount + $_tourist->tour->minDiscont) - $maxDiscount;
                    $abonentDiscount = $maxDiscount - $_tourist->tour->minDiscont;
                }

                if ($_tourist->abonentDiscont != $abonentDiscount)
                {
                    $amount = $abonentDiscount - $_tourist->abonentDiscont;
                    $_tourist->abonentDiscont = $abonentDiscount;
                    $_tourist->save();

                    DiscountTransaction::addAbonentDiscont($tourist, $_tourist, $amount);
                }
            }
        }

        return $prepayment;
    }

    private function getTouristsToChange($touragentId, $touristId)
    {
        $cmd = \Yii::app()->db->createCommand()
            ->select('tt.touristId')
            ->from('tourist_tour AS tt')
            ->join('tourists AS t', 't.id = tt.touristId')
            ->where('t.statusId = :status and tt.touragentId = :touragentId AND t.id != :touristId', [
                'status' => TouristStatus::GETTING_DISCONT,
                'touragentId' => $touragentId,
                'touristId' => $touristId
            ]);

        $tourists = [];
        foreach ($cmd->queryColumn() as $id) {
            $_tourist = Tourist::model()->findByPk($id, ['with' => ['tour']]);
            $maxDiscount = $_tourist->tour->maxDiscont;

            if ($_tourist->abonentDiscont + $_tourist->tour->minDiscont < $maxDiscount)
            {
                $tourists[] = $_tourist;
            }
        }

        return $tourists;
    }

    private function recalculateAbonentDiscont(Tourist $tourist) 
    {
        $balance = 0;
        $maxDiscount = $tourist->tour->maxDiscont;
        $abonentDiscont = $tourist->abonentDiscont + $tourist->tour->minDiscont;
        if ($abonentDiscont > $maxDiscount)
        {
            $balance += $abonentDiscont - $maxDiscount;
            $tourist->abonentDiscont = $maxDiscount - $tourist->tour->minDiscont;
            $tourist->save();
        }

        return $balance;
    }

    public function increaseAbonentDiscont(Tourist $tourist, $prepayment)
    {
        $this->addBeforeFond($tourist->tour->touragent->account);

        $prepayment = $this->processTouristFond($tourist, $prepayment);

        while (true)
        {
            $rest = $this->processTouristPrepayment($tourist, $prepayment);

            if ($rest > 0 && $rest != $prepayment)
            {
                $prepayment = $rest;
            }
            elseif ($rest > 0 && $rest == $prepayment)
            {
                $this->updateTourAgentAccount($tourist, $prepayment);
                break;
            }
            else // Rest is empty
            {
                break;
            }
        }

        $this->addAfterTourist($tourist);
        $touragent = Touragent::model()->findByPk($tourist->tour->touragentId);
        $this->addAfterFond($touragent->account);

        $this->doCheck();
    }

    public function decreaseAbonentDiscont(Tourist $tourist, $balance)
    {
        $this->addBeforeFond($tourist->tour->touragent->account);

        $balance += $this->recalculateAbonentDiscont($tourist);
        $this->updateTourAgentAccount($tourist, $balance);

        $this->addAfterTourist($tourist);
        $touragent = Touragent::model()->findByPk($tourist->tour->touragentId);
        $this->addAfterFond($touragent->account);

        $this->doCheck();
    }

    public function changeAbonentDiscountWithoutParent(Tourist $tourist, $prepayment)
    {
        switch (true) {
            case $prepayment > 0:
                $this->increaseAbonentDiscont($tourist, $prepayment);
                break;
            
            case $prepayment < 0:
                $this->decreaseAbonentDiscont($tourist, $prepayment);
                break;
        }
    }

    public function increaseParentDiscont(Tourist $sourceTourist, Tourist $distTourist, $summ)
    {
        $this->addBeforeFond($sourceTourist->tour->touragent->account);

        $balance = 0;
        $partnerDiscont = $distTourist->partnerDiscont;
        $partnerDiscont += $summ;

        $maxDiscont = $distTourist->tour->price; 
        $maxDiscont -= $distTourist->abonentDiscont;
        $maxDiscont -= $distTourist->tour->prepayment;
        $maxDiscont -= $distTourist->tour->minDiscont;
        if ($partnerDiscont > $maxDiscont)
        {
            $balance += $maxDiscont - $partnerDiscont;
            $partnerDiscont = $maxDiscont;
        }
        $ammount = $partnerDiscont - $distTourist->partnerDiscont;
        $distTourist->partnerDiscont = $partnerDiscont;
        $distTourist->save();
        DiscountTransaction::addParentDiscont($sourceTourist, $distTourist, $ammount);
        $this->updateTourAgentAccount($distTourist, $balance);

        $this->addAfterTourist($sourceTourist);
        $touragent = Touragent::model()->findByPk($sourceTourist->tour->touragentId);
        $this->addAfterFond($touragent->account);
        
        $this->doCheck();
    }

    public function decreaseParentDiscont(Tourist $sourceTourist, Tourist $distTourist, $ammount)
    {
        $this->addBeforeFond($sourceTourist->tour->touragent->account);

        $prepayment = $this->recalculateAbonentDiscont($sourceTourist);

        $distTourist->partnerDiscont += $ammount;
        $distTourist->save();
        DiscountTransaction::addParentDiscont($sourceTourist, $distTourist, $ammount);

        while ($prepayment)
        {
            $rest = $this->processTouristPrepayment($sourceTourist, $prepayment);

            if ($rest > 0 && $rest == $prepayment)
            {
                $this->updateTourAgentAccount($sourceTourist, $prepayment);
                break;
            }

            $prepayment = $rest;
        }

        $this->addAfterTourist($sourceTourist);
        $touragent = Touragent::model()->findByPk($sourceTourist->tour->touragentId);
        $this->addAfterFond($touragent->account);
        
        $this->doCheck();
    }

    public function updateTourAgentAccount(Tourist $tourist, $amount)
    {
        if ($amount != 0)
        {
            $tourAgentId = $tourist->tour->touragentId;

            $touragent = Touragent::model()->findByPk($tourAgentId);
            $touragent->account += (float) $amount;
            $touragent->save();

            DiscountTransaction::addTouragentAccount($tourist, $tourAgentId, $amount);
        }
    }


    public function addBeforeTourist(Tourist $tourist)
    {
        if (array_key_exists($tourist->id, $this->tourists['before']) === false)
        {
            $this->tourists['before'][$tourist->id] = $tourist;
        }
        
        return $this;
    }

    private function addAfterTourist(Tourist $tourist)
    {
        $this->tourists['after'][$tourist->id] = $tourist;

        return $this;
    }

    private function addBeforeFond($value)
    {
        $this->tourists['beforeFond'] = (int) $value;
        
        return $this;
    }

    private function addAfterFond($value)
    {
        $this->tourists['afterFond'] = (int) $value;

        return $this;
    }

    private function doCheck()
    {
        $cbPrice = function($tourist){
            return $tourist->tour->price;
        };
        $cbDiscount = function($tourist){
            return $tourist->getTotalDiscont();
        };

        $beforePrice = array_sum(array_map($cbPrice, $this->tourists['before']));
        $beforeDiscount = array_sum(array_map($cbDiscount, $this->tourists['before']));
        $beforeFond = $this->tourists['beforeFond'];

        $afterPrice = array_sum(array_map($cbPrice, $this->tourists['after']));
        $afterDiscount = array_sum(array_map($cbDiscount, $this->tourists['after']));
        $afterFond = $this->tourists['afterFond'];


        $delta = ($afterDiscount + $afterFond - $beforeDiscount - $beforeFond) / ($afterPrice - $beforePrice) * 100;
        $delta = round($delta, 2);
        /*
        dd([
            'beforePrice'       => $beforePrice,
            'beforeDiscount'    => $beforeDiscount,
            'beforeFond'        => $beforeFond,
            'afterPrice'        => $afterPrice,
            'afterDiscount'     => $afterDiscount,
            'afterFond'         => $afterFond,
            'delta'             => $delta,
        ]);die();*/
        
        Configuration::set(Configuration::CHECKING_DELTA, $delta, Configuration::TYPE_FLOAT);

        Logs::info("calculated delta: {$delta}" , [
            'beforePrice'       => $beforePrice,
            'beforeDiscount'    => $beforeDiscount,
            'beforeFond'        => $beforeFond,
            'afterPrice'        => $afterPrice,
            'afterDiscount'     => $afterDiscount,
            'afterFond'         => $afterFond,
        ]);
        
        if ($delta != 7) 
        {
            throw new \DiscountException("Checking delta have been failed");
        }
    }
}