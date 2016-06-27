<?php
namespace application\modules\admin\models\forms;

use application\models\Configuration;

class TouragentParam extends \CFormModel
{

    public $minDiscount;
    public $maxDiscount;

    public function init()
    {
        $this->minDiscount = Configuration::get(Configuration::MIN_DISCONT);
        $this->maxDiscount = Configuration::get(Configuration::MAX_DISCONT);
    }

    public function rules(){
        return array(
            array('maxDiscount, minDiscount', 'required'),
        );
    }

    public function attributeLabels(){
        return [
            'maxDiscount' => 'Скидка',
            'minDiscount' => 'Скидка'
        ];
    }
}