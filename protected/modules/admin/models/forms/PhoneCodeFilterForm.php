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


class PhoneCodeFilterForm extends \CFormModel
{
    public $date_from = null;
    public $date_to = null;

    public function rules(){
        return [
            ['date_from, date_to', 'type', 'type' => 'datetime'],
        ];
    }
}