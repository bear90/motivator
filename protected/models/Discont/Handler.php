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

    private function increaseParentDiscont(Tourist $parent, $price)
    {
        $confPrepayment = Configuration::get(Configuration::PREPAYMENT);
        $summ = round($price * $confPrepayment / 100);

        $balance = 0;
        $discont = $parent->discont;
        $discont += $summ;
        if ($discont > $tourist->offer->price)
        {
            $balance += $tourist->offer->price - $discont;
            $discont = $tourist->offer->price;
        }
        $parent->discont = $discont;
        $parent->save();
        $this->increaseTouragentAccount($parent, $balance);
    }

    public function increaseAbonentDiscont(Tourist $tourist, $price)
    {
        $confPrepayment = Configuration::get(Configuration::PREPAYMENT);
        $summ = round($price * $confPrepayment / 100);

        $touragentId = $tourist->offer->tour->touragentId;
        $touragent = Touragent::model()->findByPk($touragentId);

        if ($touragent->account)
        {
            $summ += $touragent->account;
            $touragent->account = 0;
            $touragent->save();
        }
        

        $cmd = \Yii::app()->db->createCommand()
            ->select([
                'tt.id as touristId',
                'tt.discont',
                'tof.price',
            ])
            ->from('tourists AS tt')
            ->join('tour_offer AS tof', 'tof.id = tt.offerId')
            ->join('tours AS tr', 'tr.id = tof.tourId')
            ->where('tt.statusId = 3 and tr.touragentId = :touragentId', ['touragentId' => $touragentId])
            ->andWhere('tt.id != :touristId', ['touristId' => $tourist->id]);
        $data = $cmd->queryAll();

        if(count($data) > 0)
        {
            $balance = 0;
            $count = count($data);
            $partSumm = round($summ / $count);
            $confMaxDiscont = Configuration::get(Configuration::MAX_DISCONT);
            foreach ($data as $item) {
                $maxDiscont = round($item['price'] * $confMaxDiscont / 100);
                $discont = $item['discont'];
                $discont += $partSumm;
                if ($discont > $maxDiscont)
                {
                    $balance += $maxDiscont - $discont;
                    $discont = $maxDiscont;
                }

                $_tourist = Tourist::model()->findByPk($item['touristId']);
                $_tourist->discont = $discont;
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
            $touragentId = $tourist->offer->tour->touragentId;
            
            $touragent = Touragent::model()->findByPk($touragentId);
            $touragent->account += (int) $summ;
            $touragent->save();
        }
    }
}