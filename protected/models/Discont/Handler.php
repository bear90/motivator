<?php

namespace application\models\Discont;

use application\models\Tourist;
use application\models\Touragent;
use application\models\defines\TouristStatus;

/**
* 
*/
class Handler
{
    
    private $tourist;
    private $parent;

    function __construct(Toursit $tourist, Tourist $parent = null)
    {
        $this->tourist = $tourist;
        $this->parent = $parent;
    }

    public function process()
    {
        if(!$this->tourist->offerId)
        {
            return false;
        }

        $prepayment = $this->tourist->offer->prepayment;

        if ($this->parent)
        {
            $this->increaseParentDiscont($prepayment);
        } else {
            $this->increasePassiveDiscont($prepayment);
        }
    }

    private function increaseParentDiscont($summ)
    {
        if ($this->parent->statusId == TouristStatus::GETTING_DISCONT && $this->parent->offer)
        {
            $discont = $this->parent->discont;
            $discont += $summ;

            if($discont > $this->parent->offer->maxDiscont) 
            {
                $balance = $this->parent->offer->maxDiscont - $discont;
                $discont = $this->parent->offer->maxDiscont;

                $this->increaseTouragentAccount($this->parent, $balance);
            }

            $this->parent->discont = $discont;
            $this->parent->save();
        }
    }

    private function increasePassiveDiscont($summ)
    {
        $touragentId = $this->tourist->offer->tour->touragentId;
        $cmd = \Yii::app()->db->createCommand()
            ->select([
                'tt.id as touristId',
                'tt.discont',
                'tr.price',
            ])
            ->from('tourists')
            ->join('tour_offer tof', 'tof.id = tt.offerId')
            ->join('tours tr', 'tr.id = tof.tourId')
            ->where('tt.statusId = 3 and tr.touragentId = :touragentId', ['touragentId' => $touragentId]);
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

                $tourist = Toursit::model()->findByPk($item['touristId']);
                $tourist->discont = $discont;
                $tourist->save();
            }
            $this->increaseTouragentAccount($this->tourist, $balance);
        } 
        else {
            $this->increaseTouragentAccount($this->tourist, $summ);
        }
    }

    private function increaseTouragentAccount(Toursit $tourist, $summ)
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