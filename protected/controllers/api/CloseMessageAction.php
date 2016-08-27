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

use application\models\Message;


class CloseMessageAction extends \CApiAction
{
    public function doRun()
    {
        
        $id = \Yii::app()->request->getParam('id');

        $message = Message::model()->findByPk($id);
        $tourist = \Yii::app()->user->model->tourist;

        // Restrict access for unknown agents
        if (!$message || !$tourist || $message->touristId != $tourist->id)
        {
            throw new \CHttpException(404, 'Not found');
        }

        $message->viewed = 1;
        $message->save();

        return [
            'message'=> 'Сообщение успешно закрыто.'
        ];
    }
}