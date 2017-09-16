<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       04.08.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\controllers\api;

\Yii::import('application.extensions.yii-mail.YiiMailMessage');
\Yii::import('application.extensions.yii-mail.vendors.swiftMailer.swift_required');


class SendFeedbackAction extends \CApiAction
{
    public function doRun()
    {
        
        $message = new \YiiMailMessage;
        $text = \Yii::app()->request->getPost('feedback');

        $message->setBody($text, 'text/html');

        $emailTo = \Yii::app()->params['helpEmail'];

        $message->addTo($emailTo);
        $message->setFrom(\Yii::app()->params['helpEmail'], 'Портал Penki.by');
        $message->setSender(\Yii::app()->params['senderEmail']);
        $message->setSubject('Ответ с сайта');

        
        if (!\Yii::app()->mail->send($message))
        {
            throw new \Exception('Ошибка отправки сообщения');
        }

        return [
            'message'=> 'Сообщение успешно отправлено.'
        ];
    }
}