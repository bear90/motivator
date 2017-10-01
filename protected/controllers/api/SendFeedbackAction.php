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

use application\models\entities;
use application\models\Tools;


class SendFeedbackAction extends \CApiAction
{
    public function doRun()
    {
        $text = \Yii::app()->request->getPost('feedback');

        $userId = null;
        if (\Yii::app()->user && \Yii::app()->user->getModel()) {
            $userId = \Yii::app()->user->getModel()->id;
        }

        $feedback = new entities\Feedback;
        $feedback->text = $text;
        $feedback->userId = $userId;
        $feedback->save();

        if ($feedback->hasErrors()) {

            throw new \Exception (Tools::errorsToString($feedback->getErrors()));
        }

        return [
            'message'=> 'Сообщение успешно отправлено.'
        ];
    }
}