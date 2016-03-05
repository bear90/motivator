<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\user;

class DashboardAction extends \CAction
{
    public function run() {
        $this->controller->render('index', [
            'tourist' => \Yii::app()->user->model->tourist
        ]);
    }
}