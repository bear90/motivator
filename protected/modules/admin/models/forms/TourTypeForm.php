<?php

/**
 * @author soza.mihail@gmail.com
 */
namespace application\modules\admin\models\forms;

class TourTypeForm extends \CFormModel
{
    public $name;

    public function rules(){
        return [
            ['name', 'required']
        ];
    }

    public function attributeLabels(){
        return [
            'name' => 'Вид тура'
        ];
    }
}
