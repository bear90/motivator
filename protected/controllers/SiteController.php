<?php

namespace application\controllers;

class SiteController extends \CController {

    public $layout = 'site';

    public function actions(){
        return [
            'captcha' => ['class'=>'CCaptchaAction', 'maxLength' => 6],
            'index' => 'application\\controllers\\site\\IndexAction',
            'checkcapture' => 'application\\controllers\\site\\CheckcaptureAction',
            'checkgroupcode' => 'application\\controllers\\site\\CheckgroupcodeAction',
            'change-offer-type' => 'application\\controllers\\site\\ChangeOfferTypeAction',
            'test' => 'application\\controllers\\site\\TestAction',
        ];
    }

//    public function actionError() {
//        $error = Yii::app()->errorHandler->error;
//die("ERROR INDEX: ");
//        var_dump(Yii::app()->request);
//        /**
//        code: the HTTP status code (e.g. 403, 500);
//        type: the error type (e.g. CHttpException, PHP Error);
//        message: the error message;
//        file: the name of the PHP script file where the error occurs;
//        line: the line number of the code where the error occurs;
//        trace: the call stack of the error;
//        source: the context source code where the error occurs.
//         */
//        if ($error) {
//            if (Yii::app()->request->isAjaxRequest) {
//                echo $error['message'];
//            } else {
//                //$this->render('error', $error);
//                print_r($error);
//            }
//        }
//    }
}