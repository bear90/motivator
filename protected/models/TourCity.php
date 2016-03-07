<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\models;


use application\components\DBEntity;

class TourCity extends DBEntity
{
    public function rules(){
        return [
            ['city', 'required'],
            ['tourId', 'safe']
        ];
    }

    public function tableName()
    {
        return 'tour_cities';
    }
}