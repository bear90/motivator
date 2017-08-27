<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\turagentam;

use application\models\forms\ManagerLoginForm;
use application\models\forms\UserLogin;
use application\models\defines\UserRole;
use application\modules\admin\models\forms as AdminForms;

class IndexAction extends \CAction
{
    public function run()
    {
        $userModel = \Yii::app()->user->getModel();
        $loginForm = new ManagerLoginForm();
        $filterFormEntity = new AdminForms\TouragentFilterForm();

        if (\Yii::app()->request->isPostRequest)
        {
            $loginForm->password = \Yii::app()->request->getPost('password');
            $loginForm->code = \Yii::app()->request->getPost('code');
            
            if ($loginForm->validate() && $loginForm->code !== null && $loginForm->loginWithCode()) {
                $this->controller->redirect(\Yii::app()->createUrl('/#block-main-table'));
                return;
            } elseif ($loginForm->validate() && $loginForm->code === null && $loginForm->loginWithoutCode()) {
                $this->controller->redirect(\Yii::app()->createUrl('/turagentstvam'));
                return;
            } elseif(is_null($loginForm->code)) {
                \Yii::app()->user->setFlash('errorLoginView', "Неверный пароль");
            } else {
                \Yii::app()->user->setFlash('errorLogin', "Неверный пароль или код");
            }
        }

        $this->controller->render('index', [
            'filterForm' => new \CForm('application.modules.admin.views.forms.touragent-filter-form', $filterFormEntity),
            'loginFormView' => new \CForm('application.views.forms.manager-login-form-view', $loginForm),
            'loginForm' => new \CForm('application.views.forms.manager-login-form', $loginForm),
            'errorLoginView' => \Yii::app()->user->getFlash('errorLoginView'),
            'errorLogin' => \Yii::app()->user->getFlash('errorLogin'),
        ]);
    }
}