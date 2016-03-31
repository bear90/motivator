<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\models;


use application\components\DBEntity;

class TouragentManagerPhone extends DBEntity
{
    public function rules(){
        return [
            ['phone', 'required'],
            ['managerId', 'safe']
        ];
    }

    public function tableName()
    {
        return 'touragent_manager_phone';
    }
}