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


class TouroperatorController extends AdminController
{
    //public $jsModule = 'text';

    public function actions(){
        return [
            'index' => 'application\\modules\\admin\\controllers\\country\\IndexAction',
            'add' => 'application\\modules\\admin\\controllers\\country\\AddAction',
            'edit' => 'application\\modules\\admin\\controllers\\country\\EditAction',
            'delete' => 'application\\modules\\admin\\controllers\\country\\DeleteAction',
        ];
    }
}