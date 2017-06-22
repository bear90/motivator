<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\turagentam;

use application\models\forms\ManagerLoginForm;
use application\models\forms\UserLogin;
use application\models\defines\UserRole;


class IndexAction extends \CAction
{
    public function run()
    {
        $userModel = \Yii::app()->user->getModel();
        $loginForm = new ManagerLoginForm();

        $loginError = null;
        if (\Yii::app()->request->isPostRequest)
        {
            $password = \Yii::app()->request->getPost('password');
            $loginForm->password = $password;

            if ($loginForm->validate() && $loginForm->login(UserRole::MANAGER)) {
                $this->controller->redirect(\Yii::app()->createUrl('/turagentam'));
                return;
            } else {
                $loginError = 'Не верный логин или пароль';
            }
        }

        $this->controller->render('index', [
            'loginForm' => new \CForm('application.views.forms.manager-login-form', $loginForm),
            'loginError' => $loginError,
        ]);
    }
}