<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\models;

use application\components\DBEntity;
use application\models\defines\TouristStatus;

class TouragentManager extends DBEntity {

    public function rules(){
        return [
            ['name', 'required'],
            ['touragentId', 'safe']
        ];
    }

    public function relations()
    {
        return [
            'touragent' => [self::BELONGS_TO, 'application\\models\\Touragent', 'touragentId'],
            'tours'     => [self::HAS_MANY, 'application\\models\\Tour', 'managerId'],
            'tourists'  => [self::HAS_MANY, 'application\\models\\Tourist', 'touristId', 'through' => 'tours' ]
        ];
    }

    public function tableName()
    {
        return 'touragent_managers';
    }

    public function getWantDiscont()
    {
        return array_filter($this->tourists, function($tourist){
            return $tourist->statusId == TouristStatus::WANT_DISCONT;
        });
    }

    public function getGettingDiscint()
    {
        return array_filter($this->tourists, function($tourist){
            return $tourist->statusId == TouristStatus::GETTING_DISCONT;
        });
    }

    public function getHaveDiscont()
    {
        return array_filter($this->tourists, function($tourist){
            return $tourist->statusId == TouristStatus::HAVE_DISCONT;
        });
    }
}