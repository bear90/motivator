<?php

namespace application\models;

use application\components\DBEntity;

class Touroperator extends DBEntity
{
    
    public function rules(){
        return [
            ['name', 'required']
        ];
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'touroperator';
    }
}