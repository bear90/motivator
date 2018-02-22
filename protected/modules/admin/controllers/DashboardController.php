<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       10.06.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\controllers;


class DashboardController extends AdminController
{
    public $layout = 'login';
    
    public function actions(){
        return [
            'captcha' => ['class'=>'CCaptchaAction', 'maxLength' => 6],
            'checkcapture' => 'application\\modules\\admin\\controllers\\dashboard\\CheckcaptureAction',
            'login' => 'application\\modules\\admin\\controllers\\dashboard\\LoginAction',
        ];
    }
}