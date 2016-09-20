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


class PostController extends AdminController
{
    public $jsModule = 'archive';

    public function actions(){
        return [
            'index' => 'application\\modules\\admin\\controllers\\post\\IndexAction',
            'report' => 'application\\modules\\admin\\controllers\\post\\ReportAction',
        ];
    }
}