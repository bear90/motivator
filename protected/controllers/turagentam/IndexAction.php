<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\turagentam;

use application\models\forms\UserLogin;
use application\models\defines\UserRole;


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

            if ($loginForm->validate() && $loginForm->login(UserRole::MANAGER)) {
                $this->controller->redirect(\Yii::app()->createUrl('/turagentam'));
                return;
            } else {
                $loginError = 'Не верный логин или пароль';
            }
        }

        // Get manager list
        $managers = [];
        if(\Yii::app()->user->isManager())
        {
            $managers = \Yii::app()->user->model->touragent->managers;
        }

        $this->controller->render('index', [
            'loginForm' => new \CForm('application.views.forms.login', $loginForm),
            'loginError' => $loginError,
            'managers' => $managers
        ]);
    }
}