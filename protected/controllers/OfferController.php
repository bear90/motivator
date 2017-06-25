<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       09.06.2017
 * @package
 * @copyright   Copyright (c) 2015-2017 soXes GmBh.
 *
 */

namespace application\controllers;


class OfferController extends \CController
{
    public $layout = 'site';

    public function actions(){
        return [
            'add' => 'application\\controllers\\offer\\AddAction',
        ];
    }
}
