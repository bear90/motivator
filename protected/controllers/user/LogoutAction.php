<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\user;

class LogoutAction extends \CAction
{
    public function run() {
        if(\Yii::app()->user->isManager())
        {
            $manager = \Yii::app()->user->getState('manager');
            $this->controller->redirect('/turagentam/dashboard/' . $manager->id);
        } else {
            \Yii::app()->user->identityCookie = array();
            \Yii::app()->user->logout();
            
            $this->controller->redirect('/');
        }
    }
}