<?php

namespace application\controllers;

class DebugController extends \CController {

    public function actionIndex(){
        \Yii::import('application.extensions.yii-mail.YiiMailMessage');

        $subject = 'test subject';
        $from = 'admin@motivator.com';
        $to = 'soza.mihail@gmail.com';

        $message = new \YiiMailMessage;
        $message->view = 'test';

        $message->setSubject($subject)
            ->setFrom($from)
            ->setTo($to);
         
        //userModel is passed to the view
        //$message->setBody($data, 'text/html');
         
        $message->from = \Yii::app()->params['adminEmail'];
        $r = null;

        var_dump(\Yii::app()->mail->send($message, $r));
        var_dump($r);
        var_dump(ini_get('safe_mode'));
    }
}