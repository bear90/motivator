<?php
namespace application\modules\admin\models\forms;

class Touroperator extends \CFormModel
{

    public $name;

    public function rules(){
        return array(
            array('name', 'required'),
        );
    }

    public function attributeLabels(){
        return [
            'name' => 'Наименование',
        ];
    }
}