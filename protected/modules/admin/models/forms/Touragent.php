<?php
namespace application\modules\admin\models\forms;

class Touragent extends \CFormModel
{

    public $name;
    public $site;

    public function rules(){
        return array(
            array('name, site', 'required'),
        );
    }

    public function attributeLabels(){
        return [
            'name' => 'Название',
            'site' => 'Сайт'
        ];
    }
}