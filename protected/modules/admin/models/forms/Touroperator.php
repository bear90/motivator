<?php
namespace application\modules\admin\models\forms;

class Touroperator extends \CFormModel
{

    public $name;
    public $boss;
    public $document;
    public $requisite;

    public function rules(){
        return array(
            array('name', 'required'),
            array('boss, document, requisite', 'safe'),
        );
    }

    public function attributeLabels(){
        return [
            'name' => 'Наименование',
            'boss' => 'Должность и ФИО руководителя',
            'document' => 'Основания  полномочий руководителя',
            'requisite' => 'Реквизиты',
        ];
    }
}