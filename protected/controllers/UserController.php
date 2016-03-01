<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers;


class UserController extends \CController
{
    public $layout = 'user';

    public function actions(){
        return [
            'dashboard' => 'application\\controllers\\user\\DashboardAction',
            'logout' => 'application\\controllers\\user\\LogoutAction',
        ];
    }

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function filterAccessControl($filterChain) {
        
        if(\Yii::app()->user->model === null) {
            $this->redirect('/');
        } else {
            $filterChain->run();
        }
    }
}