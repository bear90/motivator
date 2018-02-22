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

use application\models\forms\AdminLogin;
use application\models\Tools;

class LoginAction extends \CAction
{
    public function run()
    {
        $loginForm = new AdminLogin;
        $loginError = null;

        if (\Yii::app()->request->isPostRequest)
        {
            $password = \Yii::app()->request->getPost('password');
            $verifyCode = \Yii::app()->request->getPost('verifyCode');
            $loginForm->login = '';
            $loginForm->password = $password;
            $loginForm->verifyCode = $verifyCode;

            switch (true) {
                case !$loginForm->validate():
                    $loginError = Tools::errorsToString($loginForm->getErrors());
                    break;
                
                case !$loginForm->login():
                    $loginError = 'Не верный логин или пароль';
                    break;

                default:
                    $loginError = false;
                    $this->controller->redirect(\Yii::app()->createUrl('admin/text'));
            }
        }

        $this->controller->render('login', [
            'loginForm' => new \CForm('application.modules.admin.views.forms.login', $loginForm),
            'loginError' => $loginError
        ]);
    }
}