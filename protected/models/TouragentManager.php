<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\models;

use application\components\DBEntity;

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
            'tourists'  => [self::HAS_MANY, 'application\\models\\Tourist', 'touristId', 
                'through' => 'tours',
                'order' =>  'tourists.createdAt'],
            'phones'    => [self::HAS_MANY, 'application\\models\\TouragentManagerPhone', 'managerId']
        ];
    }

    public function tableName()
    {
        return 'touragent_managers';
    }

    public function getWantDiscont()
    {
        $tourists = $this->boss ? $this->touragent->tourists : $this->tourists;
        return array_filter($tourists, function($tourist){
            return $tourist->statusId == \application\models\defines\TouristStatus::WANT_DISCONT;
        });
    }

    public function getGettingDiscint()
    {
        $tourists = $this->boss ? $this->touragent->tourists : $this->tourists;
        return array_filter($tourists, function($tourist){
            return $tourist->statusId == \application\models\defines\TouristStatus::GETTING_DISCONT;
        });
    }

    public function getHaveDiscont()
    {
        $tourists = $this->boss ? $this->touragent->tourists : $this->tourists;
        return array_filter($tourists, function($tourist){
            return $tourist->statusId == \application\models\defines\TouristStatus::HAVE_DISCONT;
        });
    }

    public function getPhones($asString = true)
    {
        $phones = array_map(function($phone){
            return $phone;
        }, $this->phones);

        return $asString ? implode(', ', $phones) : $phones;
    }
}