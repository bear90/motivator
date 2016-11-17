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

\Yii::import('application.extensions.yiiexcel.YiiExcel', true);
\Yii::registerAutoloader(['YiiExcel', 'autoload'], true);

class ReportAction extends \CAction
{
    private $filterDefault = [
        'start' => '',
        'end' => '',
        'touroperator' => [-1],
        'touragent' => [-1]
    ];

    public function run()
    {
        $filter = \Yii::app()->request->getParam('filter', $this->filterDefault);

        $criteria = new \CDbCriteria;
        $criteria->with = ['tour', 'tour.touragent', 'tour.operator'];
        //$criteria->condition = 't.statusId = :havingDiscount';
        //$criteria->params = ['havingDiscount' => defines\TouristStatus::HAVE_DISCONT];

        $this->applyFilter($criteria, $filter);

        $entities = Tourist::model()->findAll($criteria);
        
        $filename = 'post_report_' . date('d.m.Y') . '.xls';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $this->export('php://output', $entities);
    }

    private function export($file, array $entities)
    {
        // Instantiate a new PHPExcel object
        $phpExcel = new \PHPExcel();
        // Set the active Excel worksheet to sheet 0
        $phpExcel->setActiveSheetIndex(0);
        // Initialise the Excel row number
        $rowCount = 1;
        //start of printing column names as names of MySQL fields
        $column = 'A';
        $columns = [
            ['Номер'],
            ['ФИО'],
            ['Телефон'],
            ['Email'],
            ['Статус'],
        ];
        foreach ($columns as $data) {
            $phpExcel->getActiveSheet()->setCellValue($column . $rowCount, $data[0]);
            $phpExcel->getActiveSheet()->getStyle($column . $rowCount)->getAlignment()
                ->setWrapText(true)
                ->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER)
                ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            if (isset($data['width']))
            {
                $phpExcel->getActiveSheet()->getColumnDimension($column)->setWidth($data['width']);
            } else {
                $phpExcel->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
            }
            $column++;
        }
        // Set bold
        $phpExcel->getActiveSheet()->getStyle("A1:{$column}1")->getFont()->setBold(true);

        //start while loop to get data
        $rowCount = 2;
        foreach ($entities as $i => $entity) {
            $column = 'A';

            $row = [
                $i + 1,
                $entity->fullName,
                $entity->phone,
                $entity->email,
                $entity->status->description
            ];
            foreach ($row as $data) {
                $value = $this->prepareValue($data);
                $phpExcel->getActiveSheet()->getCell($column . $rowCount)->setValue($value);
                if (is_object($value))
                {
                    $phpExcel->getActiveSheet()->getStyle($column . $rowCount)->getAlignment()->setWrapText(true);
                }
                $phpExcel->getActiveSheet()->getStyle($column . $rowCount)->getAlignment()
                        ->setVertical(\PHPExcel_Style_Alignment::VERTICAL_TOP);
                $column++;
            }
            $rowCount++;
        }

        $rowCount--;
        $phpExcel->getActiveSheet()->getStyle("A1:E{$rowCount}")->applyFromArray([
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_MEDIUM, 
                    //'color' => array('argb' => 'FFFF0000'),
                ]
            ]
        ]);

        $writer = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');
        $writer->save($file);

        return true;
    }

    private function prepareValue($data)
    {
        switch (true) {
            case !isset($data):
                return null;

            case is_array($data):
                $objRichText = new \PHPExcel_RichText();
                foreach ($data as $label => $value) {
                    if (!is_string($label))
                    {
                        $objRichText->createText($value);
                    } else {
                        $objPayable = $objRichText->createTextRun($label);
                        $objPayable->getFont()->setBold(true);
                        $objRichText->createText(" ");
                        $objRichText->createText($value);
                    }
                    $objRichText->createText("\r\n");
                }
                return $objRichText;
            
            default:
                return strip_tags(strval($data));
        }
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