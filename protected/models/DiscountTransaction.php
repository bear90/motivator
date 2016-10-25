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

    public function relations()
    {
        return [
            'sourceTourist'=>[self::BELONGS_TO, 'application\\models\\Tourist', 'sourceTouristId']
        ];
    }

    private function add(Tourist $sourceTourist, $sourceTouragentId, $summ, $targetTouragentId,
                        Tourist $targetTourist = null, $comment = '')
    {
        $this->sourceTouristId = $sourceTourist->id;
        $this->sourceTouristName = $sourceTourist->firstName . ' ' . $sourceTourist->lastName;
        $this->sourceTouragentId = $sourceTouragentId;
        $this->targetTouragentId = $targetTouragentId;
        $this->amount = (float) $summ;
        $this->comment = $comment;
        $this->createAt = new \CDbExpression("NOW()");
        if ($targetTourist !== null)
        {
            $this->targetTouristId = $targetTourist->id;
            $this->targetTouristName = $targetTourist->firstName . ' ' . $targetTourist->lastName;
        }
        $this->save();

        if($this->hasErrors()){
            throw new \Exception(\Tool::errorToString($this->errors));
        }

        return $this;
    }

    public static function addAbonentDiscont(Tourist $sourceTourist, Tourist $targetTourist, $amount)
    {
        $entry = new self;
        $touragentId = $sourceTourist->tour->touragentId;
        $entry->add($sourceTourist, $touragentId, $amount, $touragentId, $targetTourist, 'Abonent discount');
    }

    public static function addParentDiscont(Tourist $sourceTourist, Tourist $targetTourist, $amount)
    {
        $sourceTouragentId = $sourceTourist->tour->touragentId;
        $targetTouragentId = $targetTourist->tour->touragentId;
        $entry = new self;
        $entry->add($sourceTourist, $sourceTouragentId, $amount, $targetTouragentId, $targetTourist, 'Parent discount');
    }

    public static function addTouragentAccount(Tourist $sourceTourist, $targetTouragentId, $amount)
    {
        $sourceTouragentId = $sourceTourist->tour->touragentId;
        $entry = new self;
        $entry->add($sourceTourist, $sourceTouragentId, $amount, $targetTouragentId, null, 'Touragent account');
    }
}