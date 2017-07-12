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


class PasswordUpdateForm extends \CFormModel
{
    public $password;

    public function rules(){
        return [
            ['password', 'safe'],
        ];
    }
}