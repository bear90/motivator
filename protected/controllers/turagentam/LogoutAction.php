<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\turagentam;

class LogoutAction extends \CAction
{
    public function run() {
        \Yii::app()->user->identityCookie = array();
        \Yii::app()->user->logout();
        
        $this->controller->redirect('/turagentam');
    }
}