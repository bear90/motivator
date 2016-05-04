<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\models;

use application\components\DBEntity;


class DiscountTransaction extends DBEntity
{

    public function tableName()
    {
        return 'discount_transaction';
    }

    public function add(Tourist $sourceTourist, $sourceTouragentId, $summ, $targetTouragentId,
                        Tourist $targetTourist = null, $comment = '')
    {
        $this->sourceTouristId = $sourceTourist->id;
        $this->sourceTouristName = $sourceTourist->firstName . ' ' . $sourceTourist->lastName;
        $this->sourceTouragentId = $sourceTouragentId;
        $this->targetTouragentId = $targetTouragentId;
        $this->amount = (int) $summ;
        $this->comment = $comment;
        $this->createAt = new \CDbExpression("NOW()");
        if ($targetTourist !== null)
        {
            $this->targetTouristId = $targetTourist->id;
            $this->targetTouristName = $targetTourist->firstName . ' ' . $targetTourist->lastName;
        }
    }
}