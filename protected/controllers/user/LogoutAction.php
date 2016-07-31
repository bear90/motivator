<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\user;

class LogoutAction extends \CAction
{
    public function run() {
        switch (true) {
            case \Yii::app()->user->isAdmin():
                $this->controller->redirect('/admin/search');

                break;

            case \Yii::app()->user->isManager():
                $manager = \Yii::app()->user->getState('manager');
                $this->controller->redirect('/turagentam/dashboard/' . $manager->id);

                break;

            default:
                \Yii::app()->user->identityCookie = array();
                \Yii::app()->user->logout();
                
                $this->controller->redirect('/');
        }
    }
}