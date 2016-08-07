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
use application\models\defines;

\Yii::import('application.extensions.yiiexcel.YiiExcel', true);
\Yii::registerAutoloader(['YiiExcel', 'autoload'], true);

class ExportAction extends \CAction
{
    public function run()
    {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="abonent_archive.xls"');
        header('Cache-Control: max-age=0');

        $this->export('php://output');
    }

    private function export($file)
    {
        $criteria = new \CDbCriteria;
        $criteria->with = ['tour', 'tour.touragent', 'tour.operator'];
        $criteria->condition = 't.statusId = :havingDiscount';
        $criteria->params = ['havingDiscount' => defines\TouristStatus::HAVE_DISCONT];

        $entities = Tourist::model()->findAll($criteria);
        // Instantiate a new PHPExcel object
        $phpExcel = new \PHPExcel();
        // Set the active Excel worksheet to sheet 0
        $phpExcel->setActiveSheetIndex(0);
        // Initialise the Excel row number
        $rowCount = 1;
        //start of printing column names as names of MySQL fields
        $column = 'A';
        $columns = [
            'ФИО',
            'Email',
            'ТА',
            'ТО',
            'Дата продажи',
            'Стоимость',
            'МВАС',
            'НАС',
            'СзП',
        ];
        foreach ($columns as $title) {
            $phpExcel->getActiveSheet()->setCellValue($column . $rowCount, $title);
            $column++;
        }
        //start while loop to get data
        $rowCount = 2;
        foreach ($entities as $entity) {
            $column = 'A';

            $row = [
                $entity->fullName,
                $entity->email,
                $entity->tour->touragent->name,
                $entity->tour->operator ? $entity->tour->operator->name : '',
                $entity->tour->getSoldAt('d.m.Y'),
                $entity->tour->price,
                $entity->tour->maxDiscont,
                $entity->abonentDiscont,
                $entity->partnerDiscont,
            ];
            foreach ($row as $value) {
                if (!isset($value))
                    $value = NULL;
                elseif ($value != "")
                    $value = strip_tags($value);
                else
                    $value = "";

                $phpExcel->getActiveSheet()->setCellValue($column . $rowCount, $value);
                $column++;
            }
            $rowCount++;
        }

        $writer = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');
        $writer->save($file);

        return true;
    }
}