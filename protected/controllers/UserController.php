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
            'logout' => 'application\\controllers\\user\\LogoutAction',
            'ordertour' => 'application\\controllers\\user\\OrdertourAction',
            'createoffer' => 'application\\controllers\\user\\CreateofferAction',
            'removetour' => 'application\\controllers\\user\\RemovetourAction',
            'updatetour' => 'application\\controllers\\user\\UpdatetourAction',
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