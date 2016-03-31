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

    public function rules(){
        return [
            ['price, startDate, endDate', 'required'],
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

            $this->minDiscont = round($this->price * $minDiscont / 100);
            $this->maxDiscont = round($this->price * $maxDiscont / 100);
            $this->surchange = $this->price - $this->maxDiscont;
        }
    }
}