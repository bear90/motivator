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


class BannerController extends AdminController
{
    //public $jsModule = 'banner';

    public function actions(){
        return [
            'index' => 'application\\modules\\admin\\controllers\\banner\\IndexAction',
            'add' => 'application\\modules\\admin\\controllers\\banner\\AddAction',
            'update' => 'application\\modules\\admin\\controllers\\banner\\UpdateAction',
            'delete' => 'application\\modules\\admin\\controllers\\banner\\DeleteAction',
        ];
    }
}