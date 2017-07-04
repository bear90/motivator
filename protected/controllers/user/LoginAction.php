<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\user;

use application\models\forms;
use application\models\defines\UserRole;

class LoginAction extends \CAction
{
    public function run() {
        $hash = \Yii::app()->request->getParam('hash');
        $loginForm = new forms\UserLoginForm;

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