<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       31.07.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\controllers\api;

use application\models\Tourist;
use application\models\defines\TouristStatus;

class SearchTouristAction extends \CApiAction
{
    public function doRun()
    {
        $manager = \Yii::app()->user->getState('manager');

        $isAllowed = \Yii::app()->user->isManager() && $manager || \Yii::app()->user->isAdmin();

        // Restrict access for unknown agents
        if (!$isAllowed)
        {
            throw new \CHttpException(404, 'Not found');
        }

        return $this->searchTourists();
    }

    private function searchTourists() 
    {
        $manager = \Yii::app()->user->getState('manager');

        $touristId = (int) \Yii::app()->request->getParam('touristId');
        $touristLastName = \Yii::app()->request->getParam('touristLastName');
        $touristFirstName = \Yii::app()->request->getParam('touristFirstName');
        $touristMiddleName = \Yii::app()->request->getParam('touristMiddleName');
        $tourCity = \Yii::app()->request->getParam('tourCity');

        $criteria = new \CDbCriteria();

        switch (true) {
            case \Yii::app()->user->isManager() && $manager->boss:
                $touragentId = \Yii::app()->user->model->touragent->id;

                $criteria->with = ['tours', 'tour'];
                $criteria->addCondition('tours.touragentId = :touragentId OR tour.touragentId = :touragentId');
                $criteria->params['touragentId'] = $touragentId;

                break;

            case \Yii::app()->user->isManager() && !$manager->boss:

                $criteria->with = ['tours', 'tour'];
                $criteria->addCondition('tours.managerId = :managerId OR tour.managerId = :managerId');
                $criteria->params['managerId'] = $manager->id;

                break;
        }

        $criteria->with[] = 'tours.cities';
        $criteria->with[] = 'status';
        

        if(!empty($touristId))
        {
            $criteria->addCondition('t.id = :touristId');
            $criteria->params['touristId'] = $touristId;
        }

        if(!empty($touristLastName))
        {
            $criteria->addSearchCondition('t.lastName', $touristLastName);
        }

        if(!empty($touristFirstName))
        {
            $criteria->addSearchCondition('t.firstName', $touristFirstName);
        }

        if(!empty($touristMiddleName))
        {
            $criteria->addSearchCondition('t.middleName', $touristMiddleName);
        }

        if(!empty($tourCity))
        {
            $criteria->addCondition('cities.city = :city');
            $criteria->params['city'] = $tourCity;
        }

        return array_map(function($item){

            $buf = $item->attributes;
            $buf['status']['name'] = $item->status->name;

            switch ($item->statusId) {
                case TouristStatus::WANT_DISCONT:
                    $buf['counterDate'] = $item->getTimer1("d.m.Y");
                    break;
                
                default:
                    $buf['counterDate'] = $item->getCounterDate("d.m.Y");
                    break;
            }

            return $buf;

        }, Tourist::model()->findAll($criteria));
    }
}