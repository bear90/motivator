<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       17.06.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\controllers\post;

use application\models\Tourist;
use application\models\defines;

class IndexAction extends \CAction
{
    private $filterDefault = [
        'start' => '',
        'end' => '',
    ];

    public function run()
    {
        $filter = \Yii::app()->request->getParam('filter', $this->filterDefault);

        $criteria = new \CDbCriteria;
        $criteria->with = ['tour', 'tour.touragent', 'tour.operator', 'status'];
        //$criteria->condition = 't.statusId = :havingDiscount';
        //$criteria->params = ['havingDiscount' => defines\TouristStatus::HAVE_DISCONT];

        $this->applyFilter($criteria, $filter);

        $entities = Tourist::model()->findAll($criteria);

        $this->controller->render('index', [
            'entities' => $entities,
            'filter' => $filter
        ]);
    }

    private function applyFilter(\CDbCriteria $criteria, array $filter)
    {
        if ($filter['start'])
        {
            $criteria->addCondition('tour.createdAt >= :startDate');
            $date = new \DateTime($filter['start']);
            $criteria->params['startDate'] = $date->format('Y-m-d');
        }
        if ($filter['end'])
        {
            $criteria->addCondition('tour.createdAt <= :endDate');
            $date = new \DateTime($filter['end']);
            $date->add(new \DateInterval('P1D'));
            $criteria->params['endDate'] = $date->format('Y-m-d');
        }
    }
}