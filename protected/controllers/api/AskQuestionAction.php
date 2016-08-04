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
        // Restrict access for unknown agents
        if (!\Yii::app()->user->isManager())
        {
            throw new \CHttpException(404, 'Not found');
        }



        $message = new \YiiMailMessage;
        $text = \Yii::app()->request->getPost('text');

        $message->setBody($text, 'text/html');

        $message->addTo(\Yii::app()->params['adminEmail']);
        $message->setFrom(\Yii::app()->params['adminEmail'], 'МОТИВАТОР');
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