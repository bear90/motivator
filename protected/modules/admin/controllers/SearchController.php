<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       31.06.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\controllers;


class SearchController extends AdminController
{
    public $jsModule = 'search';

    public function actions(){
        return [
            'index' => 'application\\modules\\admin\\controllers\\search\\IndexAction',
        ];
    }
}