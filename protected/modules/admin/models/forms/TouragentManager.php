<?php
namespace application\modules\admin\models\forms;

class TouragentManager extends \CFormModel
{

    public $name;
    public $boss;
    public $description;

    public function rules(){
        return array(
            array('name', 'required'),
            array('boss', 'boolean'),
            array('description', 'type', 'type' => 'string'),
        );
    }

    public function attributeLabels(){
        return [
            'name' => 'ФИО',
            'boss' => 'Руководитель',
            'description' => 'Блок данных менеджера',
        ];
    }
}