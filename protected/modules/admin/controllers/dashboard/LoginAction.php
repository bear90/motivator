<?php

/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       10.06.2016
 * @package
 *
 */

namespace application\modules\admin\controllers\dashboard;

class LoginAction extends \CAction
{
    public function run()
    {

        $message = '';
        if (\Yii::app()->user->hasState('message'))
        {
            $message = \Yii::app()->user->getState('message');
            \Yii::app()->user->setState('message', null);
        }

        $this->controller->render('login', [
            'message' => $message
        ]);
    }
}