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
        $criteria->condition = "t.touragentId = :touragentId";
        $criteria->params['touragentId'] = $touragentId;

        return Tour::model()->findAll($criteria);
    }
}