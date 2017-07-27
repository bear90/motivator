<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       17.06.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\controllers;


class PhoneCodeController extends AdminController
{
    public $jsModule = 'phonecode';

    public function actions(){
        return [
            'index' => 'application\\modules\\admin\\controllers\\phonecode\\IndexAction',
            //'delete' => 'application\\modules\\admin\\controllers\\code\\DeleteAction',
            //'view' => 'application\\modules\\admin\\controllers\\code\\ViewAction',
        ];
    }
}
