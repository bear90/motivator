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

namespace application\modules\admin\controllers\archive;

use application\models\Tourist;
use application\models\Touroperator;
use application\models\defines;

class Akt1Action extends \CAction
{

    private $months = [
        1 => 'января',
        'февраля',
        'марта',
        'апреля',
        'мая',
        'июня',
        'июля',
        'августа',
        'сентября',
        'октября',
        'ноября',
        'декабря',
    ];

    private $filterDefault = [
        'start' => '',
        'end' => '',
        'touroperator' => [-1],
        'touragent' => [-1]
    ];

    public function run()
    {
        $filter = [
            'start' => \Yii::app()->request->getParam('start'),
            'end' => \Yii::app()->request->getParam('end'),
            'touroperator' => \Yii::app()->request->getParam('touroperator')
        ];
        $filter['touroperator'] = $filter['touroperator'][0];

        $criteria = new \CDbCriteria;
        $criteria->with = ['tour', 'tour.touragent', 'tour.operator'];
        $criteria->condition = 't.statusId = :havingDiscount';
        $criteria->params = ['havingDiscount' => defines\TouristStatus::HAVE_DISCONT];

        $this->applyFilter($criteria, $filter);

        $entities = Tourist::model()->findAll($criteria);

        $filename = 'akt1_' . date('d.m.Y') . '.docx';

        header('Content-Type: application/msword');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $this->export($entities, $filter);
    }

    private function export(array $entities, array $filter)
    {
        $sourceFolder = \Yii::app()->basePath . '/files/akt1';
        $tmpFolder = \Yii::app()->basePath . '/runtime/akt1';
        $file = \Yii::app()->basePath . '/runtime/akt1.zip';
        $document = \Yii::app()->basePath . '/runtime/akt1/word/document.xml';

        if (file_exists($tmpFolder))
        {
            \Tool::deleteFolder($tmpFolder);
        }

        \Tool::copyFolder($sourceFolder, $tmpFolder);

        $this->prepareDocument($document, $entities, $filter);

        \Tool::zipFolder($tmpFolder, $file);

        echo file_get_contents($file);

        \Tool::deleteFolder($tmpFolder);
        unlink($file);
    }

    private function prepareDocument($document, array $entities, array $filter)
    {
        $dateStart = new \DateTime($filter['start']);
        $dateEnd = new \DateTime($filter['end']);
        $operator = Touroperator::model()->findByPk($filter['touroperator']);
        $summPrice = 0;
        foreach ($entities as $entity) {
            $summPrice += $entity->tour->price;
        }
        $percent = $operator->percent ?: 0;
        $summPrice = round($summPrice*$percent/100);

        $count = count($entities);

        $replace = [
            '{num}' => $operator->contractNumber,
            '{d0}' => $dateStart->format('d'),
            '{m0}' => $dateStart->format('m'),
            '{m0pr}' => $this->months[$dateStart->format('n')],
            '{y0}' => $dateStart->format('Y'),
            '{d1}' => $dateEnd->format('d'),
            '{m1}' => $dateEnd->format('m'),
            '{m1pr}' => $this->months[$dateEnd->format('n')],
            '{y1}' => $dateEnd->format('Y'),
            '{operatorName}' => $operator->name,
            '{operatorFio}' => $operator->boss,
            '{doc}' => $operator->document,
            '{count}' => \Tool::num2str($count, false),
            '{countInt}' => $count,
            '{priceInt}' => $summPrice,
            '{price}' => $summPrice . ' (' . \Tool::num2str($summPrice, false) . ')',
            '{deadline}' => $this->getDeadLine($dateEnd),
            '{operatorRekvizit}' => 
                $this->controller->renderPartial('xml/reachtext', ['text' => $operator->requisite], true),
            '{tableXml}' => 
                $this->controller->renderPartial('xml/table', ['rows' => $entities, 'percent' => $percent], true),
        ];

        $content = file_get_contents($document);
        $content = str_replace(array_keys($replace), array_values($replace), $content);

        file_put_contents($document, $content);
    }

    private function getDeadLine(\DateTime $date)
    {
        

        $month = $date->format('m') + 1;
        if ($month > 12)
        {
            $month = 1;
        }

        return $this->months[$month] . ' ' . $date->format('Y');
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
        if (!empty($filter['touroperator']))
        {
            $criteria->addCondition('tour.operatorId = :operatorId');
            $criteria->params['operatorId'] = $filter['touroperator'];
        }
    }
}