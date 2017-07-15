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

        if (\Yii::app()->request->isPostRequest)
        {
            $loginForm->password = \Yii::app()->request->getPost('password');
            $loginForm->code = \Yii::app()->request->getPost('code');
            
            if ($loginForm->validate() && $loginForm->code !== null && $loginForm->loginWithCode()) {
                $this->controller->redirect(\Yii::app()->createUrl('/#block-main-table'));
                return;
            } elseif ($loginForm->validate() && $loginForm->code === null && $loginForm->loginWithoutCode()) {
                $this->controller->redirect(\Yii::app()->createUrl('/#block-main-table'));
                return;
            } elseif(is_null($loginForm->code)) {
                \Yii::app()->user->setFlash('errorLoginView', "Не верный пароль");
            } else {
                \Yii::app()->user->setFlash('errorLogin', "Не верный пароль или код");
            }
        }

        $this->controller->render('index', [
            'loginFormView' => new \CForm('application.views.forms.manager-login-form-view', $loginForm),
            'loginForm' => new \CForm('application.views.forms.manager-login-form', $loginForm),
            'errorLoginView' => \Yii::app()->user->getFlash('errorLoginView'),
            'errorLogin' => \Yii::app()->user->getFlash('errorLogin'),
        ]);
    }
}