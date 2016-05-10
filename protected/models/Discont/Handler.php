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

        $totalDiscont = $partnerDiscont + $distTourist->abonentDiscont;
        if ($totalDiscont > $distTourist->tour->price)
        {
            $balance += $distTourist->tour->price - $totalDiscont;
            $partnerDiscont = $distTourist->tour->price;
        }
        $ammount = $partnerDiscont - $distTourist->partnerDiscont;
        $distTourist->partnerDiscont = $partnerDiscont;
        $distTourist->save();
        DiscountTransaction::addParentDiscont($sourceTourist, $distTourist, $ammount);
        $this->increaseTouragentAccount($distTourist, $balance);
    }

    public function increaseTouristAbonentDiscont(Tourist $tourist, $summ)
    {
        $balance = 0;
        $abonentDiscont = $tourist->abonentDiscont;
        $abonentDiscont += $summ;

        $confMaxDiscont = Configuration::get(Configuration::MAX_DISCONT);
        if ($abonentDiscont > $maxAbonentDiscont)
        {
            $balance += $maxAbonentDiscont - $abonentDiscont;
            $abonentDiscont = $maxAbonentDiscont;
        }
        $ammount = $abonentDiscont - $distTourist->abonentDiscont;
        $tourist->abonentDiscont = $abonentDiscont;
        $tourist->save();
        DiscountTransaction::addAbonentDiscont($tourist, $tourist, $ammount);
        $this->increaseTouragentAccount($tourist, $balance);
    }

    public function increaseAbonentDiscont(Tourist $tourist, $summ)
    {
        $touragentId = $tourist->tour->touragentId;
        $touragent = Touragent::model()->findByPk($touragentId);

        if ($touragent->account)
        {
            $summ += $touragent->account;
            $touragent->account = 0;
            $touragent->save();
        }
        

        $cmd = \Yii::app()->db->createCommand()
            ->select([
                'tt.touristId',
                't.abonentDiscont',
                'tt.price',
            ])
            ->from('tourist_tour AS tt')
            ->join('tourists AS t', 't.id = tt.touristId')
            ->where('t.statusId = :status and tt.touragentId = :touragentId AND t.id != :touristId', [
                'status' => TouristStatus::GETTING_DISCONT,
                'touragentId' => $touragentId,
                'touristId' => $tourist->id
            ]);
        $data = $cmd->queryAll();

        if(count($data) > 0)
        {
            $balance = 0;
            $count = count($data);
            $partSumm = round($summ / $count);
            $confMaxDiscont = Configuration::get(Configuration::MAX_DISCONT);
            foreach ($data as $item) {
                $maxAbonentDiscont = round($item['price'] * $confMaxDiscont / 100);
                $abonentDiscont = $item['abonentDiscont'];
                $abonentDiscont += $partSumm;
                if ($abonentDiscont > $maxAbonentDiscont)
                {
                    $balance += $maxAbonentDiscont - $abonentDiscont;
                    $abonentDiscont = $maxAbonentDiscont;
                }

                $_tourist = Tourist::model()->findByPk($item['touristId'], ['with' => ['tour']]);
                $ammount = $abonentDiscont - $_tourist->abonentDiscont;
                $_tourist->abonentDiscont = $abonentDiscont;
                $_tourist->save();
                DiscountTransaction::addAbonentDiscont($tourist, $_tourist, $ammount);
            }
            $this->increaseTouragentAccount($tourist, $balance);
        } 
        else {
            $this->increaseTouragentAccount($tourist, $summ);
        }
    }

    private function increaseTouragentAccount(Tourist $tourist, $summ)
    {
        if ($summ > 0)
        {
            $touragentId = $tourist->tour->touragentId;
            
            $touragent = Touragent::model()->findByPk($touragentId);
            $touragent->account += (int) $summ;
            $touragent->save();

            DiscountTransaction::addTouragentAccount($tourist, $touragentId, $summ);
        }
    }
}