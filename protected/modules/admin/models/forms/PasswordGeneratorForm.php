<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       11.07.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\models\forms;

use application\models\defines\UserRole;


class PasswordGeneratorForm extends \CFormModel
{
    public $count;

    public function rules(){
        return [
            ['count', 'required'],
        ];
    }

    public function attributeLabels(){
        return [
            'count' => 'Колличество',
        ];
    }
}