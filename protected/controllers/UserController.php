<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers;


class UserController extends \CController
{
    public $layout = 'user';

    public $activeTab = 'tab7';

    public function actions(){
        return [
            'dashboard' => 'application\\controllers\\user\\DashboardAction',
            'login' => 'application\\controllers\\user\\LoginAction',
            'logout' => 'application\\controllers\\user\\LogoutAction',
            'ordertour' => 'application\\controllers\\user\\OrdertourAction',
            'createoffer' => 'application\\controllers\\user\\CreateofferAction',
            'removetour' => 'application\\controllers\\user\\RemovetourAction',
            'updatetour' => 'application\\controllers\\user\\UpdatetourAction',
            'confirmoffer' => 'application\\controllers\\user\\ConfirmofferAction',
            'settimer' => 'application\\controllers\\user\\SettimerAction',
            'confirmpaid' => 'application\\controllers\\user\\ConfirmpaidAction',
            'changetour' => 'application\\controllers\\user\\ChangetourAction',
            'change-and-paid-tour' => 'application\\controllers\\user\\ChangeAndPaidTourAction',
            'edittour' => 'application\\controllers\\user\\EdittourAction',
        ];
    }

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function filterAccessControl($filterChain) {
        
        if(\Yii::app()->user->model === null && \Yii::app()->controller->action->id !== 'login') {
            $this->redirect('/');
        } else {
            $filterChain->run();
        }
    }
}