<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\site;

use application\models\forms\UserRegister;


class CheckcaptureAction extends \CAjaxAction
{
    public function doRun()
    {
        $registerForm = new UserRegister();
        $registerForm->verifyCode = \Yii::app()->request->getParam('verifyCode');

        return [
            'valid' => $registerForm->validate(['verifyCode'])
        ];
    }
}