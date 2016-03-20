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
            'touragent'=>[self::BELONGS_TO, 'application\\models\\Touragent', 'touragentId']
        ];
    }

    public function tableName()
    {
        return 'touragent_managers';
    }
}