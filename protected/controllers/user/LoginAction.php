<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\user;

use application\models\forms\UserLogin;
use application\models\defines\UserRole;

class LoginAction extends \CAction
{
    public function run() {
        $hash = \Yii::app()->request->getParam('hash');
        $loginForm = new UserLogin;

        if ($hash)
        {
            $password = \Yii::app()->request->getPost('password');
            $loginForm->password = $password;

            if ($loginForm->validate() && $loginForm->loginByHash(UserRole::USER, $hash)) {
                $this->controller->redirect(\Yii::app()->createUrl('/#block-main-table'));
                return;
            }
        }

        $this->controller->redirect('/');
    }
}