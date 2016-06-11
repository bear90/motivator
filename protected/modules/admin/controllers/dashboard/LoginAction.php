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

class LoginAction extends \CAction
{
    public function run()
    {
        $loginForm = new AdminLogin;
        $loginError = null;

        if (\Yii::app()->request->isPostRequest)
        {
            $password = \Yii::app()->request->getPost('password');
            $loginForm->login = '';
            $loginForm->password = $password;

            if ($loginForm->validate() && $loginForm->login()) {
                $loginError = false;
                $this->controller->redirect(\Yii::app()->createUrl('admin/touragent'));
            } else {
                $loginError = 'Не верный логин или пароль';
            }
        }

        $this->controller->render('login', [
            'loginForm' => new \CForm('application.modules.admin.views.forms.login', $loginForm),
            'loginError' => $loginError
        ]);
    }
}