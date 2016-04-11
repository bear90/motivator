<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\models;

use application\components\DBEntity;

class Message extends DBEntity {

    public function rules(){
        return [
            ['touristId, managerId, text, createdAt', 'safe']
        ];
    }

    public function relations()
    {
        return [
            'tourist'=>[self::BELONGS_TO, 'application\\models\\Tourist', 'touristId'],
            'manager'=>[self::BELONGS_TO, 'application\\models\\TouragentManager', 'managerId'],
        ];
    }

    public function tableName()
    {
        return 'message';
    }
}