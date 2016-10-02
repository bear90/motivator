<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\user;

use application\models\Tour;
use application\models\Tourist;

class DashboardAction extends \CAction
{
    public function run($id = null) {

        $tourFormSubmitted = false;
        $touragent = null;
        $tourist = null;
        $manager = null;

        switch (true) {
            case \Yii::app()->user->isUser():
                $tourist = \Yii::app()->user->model->tourist;
                break;

            case \Yii::app()->user->isManager():
                $tourist = Tourist::model()->findByPk($id);
                $touragent = \Yii::app()->user->model->touragent;
                $manager = \Yii::app()->user->getState('manager');

                // Restrict access for unknown agents
                if (!$tourist || !$tourist->hasTouragent($touragent->id))
                {
                    throw new \CHttpException(404, 'Not found');
                }
                break;

            case \Yii::app()->user->isAdmin():
                $tourist = Tourist::model()->findByPk($id);

                if (!$tourist)
                {
                    throw new \CHttpException(404, 'Not found');
                }
                break;
        }

        if (\Yii::app()->user->hasState('tour::created'))
        {
            $tourFormSubmitted = true;
            \Yii::app()->user->setState('tour::created', null);
        }

        if($tourist->messages && !$tourFormSubmitted) 
        {
            $this->controller->activeTab = '';
        }

        if(\Yii::app()->request->getParam('tab') !== null)
        {
            $this->controller->activeTab = \Yii::app()->request->getParam('tab');
        }

        $criteria = new \CDbCriteria();
        $criteria->with = ['cities', 'touragent', 'offers'];
        $criteria->condition = 't.touristId = :touristId';
        $criteria->params = ['touristId' => $tourist->id];
        $criteria->order = 't.id desc';

        $tours = Tour::model()->findAll($criteria);

        $this->controller->render('index', [
            'touragent' => $touragent,
            'tourist' => $tourist,
            'manager' => $manager,
            'tourFormSubmitted' => $tourFormSubmitted,
            'tours' => $tours,
            'messages' => $tourist->messages,
            'message' => \Yii::app()->user->getFlash('message')
        ]);
    }
}