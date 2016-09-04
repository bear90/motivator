<?php
namespace application\modules\admin\models\forms;

class Touroperator extends \CFormModel
{

    public $name;
    public $boss;
    public $document;
    public $requisite;
    public $contractNumber;
    public $percent;

    public function rules(){
        return array(
            array('name', 'required'),
            array('boss, document, requisite, contractNumber, percent', 'safe'),
        );
    }

    public function attributeLabels(){
        return [
            'name' => 'Наименование',
            'boss' => 'Должность и ФИО руководителя',
            'document' => 'Основания  полномочий руководителя',
            'requisite' => 'Реквизиты',
            'contractNumber' => 'Номер договора',
            'percent' => 'Процент вознаграждения',
        ];
    }
}