<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       09.11.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\controllers;


class ScreenController extends \CController {

    public $layout = 'screen';

    public function actions()
    {
        return [
            'lk' => 'application\\controllers\\screen\\LkAction',
        ];
    }
}