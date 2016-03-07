<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\user;

use application\models\Tour;

class DashboardAction extends \CAction
{
    public function run() {

        $tourFormSubmitted = false;

        if (\Yii::app()->user->hasState('tour::created'))
        {
            $tourFormSubmitted = true;
            \Yii::app()->user->setState('tour::created', null);
            $this->controller->activeTab = 'tab1';
        }

        $criteria = new \CDbCriteria();
        $criteria->with = ['cities', 'touragent'];
        $criteria->order = 't.id desc';

        $tours = Tour::model()->findAll($criteria);

        $this->controller->render('index', [
            'tourist' => \Yii::app()->user->model->tourist,
            'tourFormSubmitted' => $tourFormSubmitted,
            'tours' => $tours
        ]);
    }
}