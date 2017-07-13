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
            } else {
                $mess = is_null($loginForm->code) ? "Не верный пароль" : "Не верный пароль или код";
                \Yii::app()->user->setFlash('error', $mess);
            }
        }

        $this->controller->render('index', [
            'loginForm' => new \CForm('application.views.forms.manager-login-form', $loginForm),
            'error' => \Yii::app()->user->getFlash('error'),
        ]);
    }
}