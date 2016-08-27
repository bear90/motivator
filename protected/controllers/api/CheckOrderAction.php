<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       04.08.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\controllers\api;

use application\models\Tour;


class CheckOrderAction extends \CApiAction
{
    public function doRun()
    {
        $lastId = \Yii::app()->request->getParam('lastId');

        $touragent = \Yii::app()->user->model->touragent;


        // Restrict access for unknown agents
        if (!$touragent)
        {
            throw new \CHttpException(404, 'Not found');
        }

        $newTours = array_map(function($tour){
            return [
                'id' => $tour->id,
                'link' => \Yii::app()->createUrl('user/dashboard/' . $tour->tourist->id),
                'touristName' => $tour->tourist->getFullName(),
                'cities' => $tour->getCities()
            ];
        }, $this->getNewTours($lastId));

        return [
            'new' => $newTours
        ];
    }

    private function getNewTours($lastId)
    {
        $touragent = \Yii::app()->user->model->touragent;
        
        $criteria = new \CDbCriteria();
        $criteria->condition = "t.touragentId = :touragentId AND managerId is null";
        $criteria->order = "t.id";
        $criteria->params['touragentId'] = $touragent->id;

        if ($lastId)
        {
            $criteria->addCondition('t.id > :lastId');
            $criteria->params['lastId'] = $lastId;
        }

        return Tour::model()->findAll($criteria);
    }
}
