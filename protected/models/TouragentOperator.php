<?php

namespace application\models;

use application\components\DBEntity;

class TouragentOperator extends DBEntity
{
    
    public function rules(){
        return [
            ['touragentId, touroperatorId', 'required']
        ];
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'touragent_operator';
    }

    public static function getList() 
    {
        $list = self::model()->options()->findAll();
        $list = \CHtml::listData($list, 'id', 'name');
        
        return $list;
    }
}