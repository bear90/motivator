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


class CodeUpdateForm extends \CFormModel
{
    public $showall;
    public $code;

    public function rules(){
        return [
            ['code', 'safe'],
        ];
    }
}