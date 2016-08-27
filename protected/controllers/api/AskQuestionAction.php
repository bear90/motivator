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


class AskQuestionAction extends \CApiAction
{
    public function doRun()
    {
        
        $message = new \YiiMailMessage;
        $text = \Yii::app()->request->getPost('text');

        $message->setBody($text, 'text/html');

        $emailTo = \Yii::app()->request->getPost('emailTo');

        if (!isset($emailTo))
        {
            $emailTo = \Yii::app()->params['helpEmail'];
        } 
        elseif (!preg_match('/motivator\-travel\.by$/', $emailTo)) 
        {
            throw new \Exception('Ошибка отправки сообщения');
        }

        $message->addTo($emailTo);
        $message->setFrom(\Yii::app()->params['helpEmail'], 'МОТИВАТОР');
        $message->setSender(\Yii::app()->params['senderEmail']);
        $message->setSubject('Вопрос из рабочего кабинета');

        $attachment = \CUploadedFile::getInstanceByName('file');
        if ($attachment)
        {
            $file = $attachment->getTempName();
            $filename = $attachment->getName();
            $message->attach(
                \Swift_Attachment::fromPath($file)->setFilename($filename)
            );
        }

        if (!\Yii::app()->mail->send($message))
        {
            throw new \Exception('Ошибка отправки сообщения');
        }

        return [
            'message'=> 'Сообщение успешно отправлено.'
        ];
    }
}