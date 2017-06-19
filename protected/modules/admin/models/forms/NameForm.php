<?php

/**
 * @author soza.mihail@gmail.com
 */
namespace application\modules\admin\models\forms;

class NameForm extends \CFormModel
{
    public $name;
    public $type;

    public function rules(){
        return [
            ['name, type', 'required']
        ];
    }

    public function attributeLabels(){
        return [
            'name' => 'Имя'
        ];
    }
}
