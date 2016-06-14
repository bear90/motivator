<?php

namespace application\models\Discont;

use application\models\Configuration;
use application\models\Tourist;
use application\models\Touragent;
use application\models\DiscountTransaction;
use application\models\defines\TouristStatus;

/**
* 
*/
class Handler
{

    public function increaseParentDiscont(Tourist $sourceTourist, Tourist $distTourist, $summ)
    {
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
    }

    public function decreaseParentDiscont(Tourist $sourceTourist, Tourist $distTourist, $ammount)
    {
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
    }

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

        $cmd = \Yii::app()->db->createCommand()
            ->select('tt.touristId')
            ->from('tourist_tour AS tt')
            ->join('tourists AS t', 't.id = tt.touristId')
            ->where('t.statusId = :status and tt.touragentId = :touragentId AND t.id != :touristId', [
                'status' => TouristStatus::GETTING_DISCONT,
                'touragentId' => $tourist->tour->touragentId,
                'touristId' => $tourist->id
            ]);
        $data = $cmd->queryColumn();

        $tourists = [];
        foreach ($data as $touristId) {
            $_tourist = Tourist::model()->findByPk($touristId, ['with' => ['tour']]);
            $maxDiscount = $_tourist->tour->maxDiscont;

            if ($_tourist->abonentDiscont + $_tourist->tour->minDiscont < $maxDiscount)
            {
                $tourists[] = $_tourist;
            }
        }

        if(count($tourists) > 0)
        {
            $part = round($prepayment / count($tourists));
            $prepayment = 0;

            foreach ($tourists as $_tourist) {
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

    public function decreaseAbonentDiscont(Tourist $tourist, $balance)
    {
        $balance += $this->recalculateAbonentDiscont($tourist);
        $this->updateTourAgentAccount($tourist, $balance);
    }

    public function increaseAbonentDiscont(Tourist $tourist, $prepayment)
    {
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
    }

    public function updateTourAgentAccount(Tourist $tourist, $amount)
    {
        if ($amount != 0)
        {
            $tourAgentId = $tourist->tour->touragentId;

            $touragent = Touragent::model()->findByPk($tourAgentId);
            $touragent->account += (int) $amount;
            $touragent->save();

            DiscountTransaction::addTouragentAccount($tourist, $tourAgentId, $amount);
        }
    }
}