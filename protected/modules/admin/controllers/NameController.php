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


class NameController extends AdminController
{
    public $jsModule = 'userName';

    public function actions(){
        return [
            'index' => 'application\\modules\\admin\\controllers\\name\\IndexAction',
            'edit' => 'application\\modules\\admin\\controllers\\name\\EditAction',
            'delete' => 'application\\modules\\admin\\controllers\\name\\DeleteAction',
        ];
    }
}