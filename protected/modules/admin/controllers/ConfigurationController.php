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


class ConfigurationController extends AdminController
{
    //public $jsModule = 'configuration';

    public function actions(){
        return [
            'index' => 'application\\modules\\admin\\controllers\\configuration\\IndexAction'
        ];
    }
}