<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\turagentam;

use application\models\Tour;


class DashboardAction extends \CAction
{
    public function run($id) {

        $id = intval($id);
        $manager = \Yii::app()->user->model->touragent->getManager($id);
        \Yii::app()->user->setState('manager', $manager);

        if(!$manager)
        {
            throw new \CHttpException(404, 'Not found');
        }

        $this->controller->layout = "agent-dashboard";
        
        $this->controller->render('dashboard', [
            'newTours' => $this->getNewTours(),
            'manager' => $manager
        ]);
    }

    private function getNewTours()
    {
        $touragentId = \Yii::app()->user->model->touragent->id;

        $criteria = new \CDbCriteria();
        $criteria->condition = "t.touragentId = :touragentId AND managerId is null";
        $criteria->params['touragentId'] = $touragentId;

        return Tour::model()->findAll($criteria);
    }
}