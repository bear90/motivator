<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       10.07.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\controllers;


class ParamsController extends AdminController
{

    public function actions(){
        return [
            'index' => 'application\\modules\\admin\\controllers\\params\\IndexAction',
        ];
    }
}