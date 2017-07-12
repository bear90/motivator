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


class SecurityController extends AdminController
{
    public $jsModule = 'security';

    public function actions(){
        return [
            'index' => 'application\\modules\\admin\\controllers\\security\\IndexAction',
            'delete' => 'application\\modules\\admin\\controllers\\security\\DeleteAction',
            'view' => 'application\\modules\\admin\\controllers\\security\\ViewAction',
        ];
    }
}
