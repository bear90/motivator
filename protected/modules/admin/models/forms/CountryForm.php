<?php

/**
 * @author soza.mihail@gmail.com
 */
namespace application\modules\admin\models\forms;

class CountryForm extends \CFormModel
{
    public $name;
    public $type;

    public function rules(){
        return [
            ['name', 'required']
        ];
    }

    public function attributeLabels(){
        return [
            'name' => 'Страна'
        ];
    }
}
