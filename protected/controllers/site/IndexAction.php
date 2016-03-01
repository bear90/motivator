<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\site;

use application\models\forms\UserLogin;


class IndexAction extends \CAction
{
    public function run()
    {
        $userModel = \Yii::app()->user->getModel();
        $loginForm = new UserLogin;

        $loginError = null;
        if (\Yii::app()->request->isPostRequest)
        {
            $password = \Yii::app()->request->getPost('password');
            $loginForm->password = $password;

            if ($loginForm->validate() && $loginForm->login()) {
                $this->controller->redirect(\Yii::app()->createUrl('user/dashboard'));
                return;
            } else {
                $loginError = 'Не верный логин или пароль';
            }
        }

        $this->controller->render('index', [
            'loginForm' => new \CForm('application.views.forms.login', $loginForm),
            'loginError' => $loginError
        ]);
    }
}