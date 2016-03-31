<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\turagentam;

use application\models\Tour;
use application\models\Tourist;


class DashboardAction extends \CAction
{
    public function run($id) 
    {
        $id = intval($id);

        $manager = \Yii::app()->user->model->touragent->getManager($id);
        
        if(!$manager)
        {
            throw new \CHttpException(404, 'Not found');
        }

        if(\Yii::app()->request->getParam('tab') !== null)
        {
            $this->controller->activeTab = \Yii::app()->request->getParam('tab');
        }

        $foundTourists = null;
        if(\Yii::app()->request->getPost('searchTourist') !== null)
        {
            $foundTourists = $this->searchTourists();
        }

        \Yii::app()->user->setState('manager', $manager);
        $this->controller->layout = "agent-dashboard";
        
        $this->controller->render('dashboard', [
            'newTours' => $this->getNewTours(),
            'manager' => $manager,
            'foundTourists' => $foundTourists
        ]);
    }

    private function searchTourists() 
    {
        $touragentId = \Yii::app()->user->model->touragent->id;

        $touristId = \Yii::app()->request->getPost('touristId');
        $touristLastName = \Yii::app()->request->getPost('touristLastName');
        $touristFirstName = \Yii::app()->request->getPost('touristFirstName');
        $touristMiddleName = \Yii::app()->request->getPost('touristMiddleName');
        $tourCity = \Yii::app()->request->getPost('tourCity');

        $criteria = new \CDbCriteria();
        $criteria->with = ['tours', 'tours.cities'];
        $criteria->addCondition('tours.touragentId = :touragentId');
        $criteria->params['touragentId'] = $touragentId;

        if(!empty($touristId))
        {
            $criteria->addCondition('t.id = :touristId');
            $criteria->params['touristId'] = $touristId;
        }

        if(!empty($touristLastName))
        {
            $criteria->addCondition('t.lastName = :lastName');
            $criteria->params['lastName'] = $touristLastName;
        }

        if(!empty($touristFirstName))
        {
            $criteria->addCondition('t.firstName = :firstName');
            $criteria->params['firstName'] = $touristFirstName;
        }

        if(!empty($touristMiddleName))
        {
            $criteria->addCondition('t.middleName = :middleName');
            $criteria->params['middleName'] = $touristMiddleName;
        }

        if(!empty($tourCity))
        {
            $criteria->addCondition('cities.city = :city');
            $criteria->params['city'] = $tourCity;
        }

        return Tourist::model()->findAll($criteria);
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