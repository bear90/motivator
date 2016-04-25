<?php

namespace application\models\Discont;

use application\models\Configuration;
use application\models\Tourist;
use application\models\Touragent;
use application\models\defines\TouristStatus;

/**
* 
*/
class Handler
{

    public function increaseParentDiscont(Tourist $parent, $price)
    {
        $confPrepayment = Configuration::get(Configuration::PREPAYMENT);
        $summ = round($price * $confPrepayment / 100);

        $balance = 0;
        $partnerDiscont = $parent->partnerDiscont;
        $partnerDiscont += $summ;

        $totalDiscont = $partnerDiscont + $parent->abonentDiscont;
        if ($totalDiscont > $parent->tour->price)
        {
            $balance += $parent->tour->price - $totalDiscont;
            $partnerDiscont = $parent->tour->price;
        }
        $parent->partnerDiscont = $partnerDiscont;
        $parent->save();
        $this->increaseTouragentAccount($parent, $balance);
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

                $_tourist = Tourist::model()->findByPk($item['touristId']);
                $_tourist->abonentDiscont = $abonentDiscont;
                $_tourist->save();
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
        }
    }
}