<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\models;

use application\components\DBEntity;

class Currency extends DBEntity {

    public function rules(){
        return [
            ['key, value', 'required']
        ];
    }

    public function relations()
    {
        return [];
    }

    public function tableName()
    {
        return 'currency';
    }

    public static function get($name)
    {
        return self::model()->findByAttributes(['key' => $name]);
    }
}