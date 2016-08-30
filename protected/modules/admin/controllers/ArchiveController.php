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


class ArchiveController extends AdminController
{
    public $jsModule = 'archive';

    public function actions(){
        return [
            'index' => 'application\\modules\\admin\\controllers\\archive\\IndexAction',
            'export' => 'application\\modules\\admin\\controllers\\archive\\ExportAction',
        ];
    }
}