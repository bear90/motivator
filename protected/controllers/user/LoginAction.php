<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\user;

use application\models\forms\UserLogin;
use application\controllers\SiteController;


class LoginAction extends \CAction
{
    public function run() {
        $loginForm = new UserLogin;

        $password = \Yii::app()->request->getPost('UserLogin');

        if (isset($password)) {
            $loginForm->password = $password;

            if ($loginForm->validate() && $loginForm->login()) {
                $this->controller->redirect(Yii::app()->createUrl('user/dashboard'));
                return;
            }
        }
    }
}