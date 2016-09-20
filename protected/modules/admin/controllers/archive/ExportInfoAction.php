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

class ExportInfoAction extends \CAction
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
        $criteria->condition = 't.statusId = :havingDiscount';
        $criteria->params = ['havingDiscount' => defines\TouristStatus::HAVE_DISCONT];

        $this->applyFilter($criteria, $filter);

        $entities = Tourist::model()->findAll($criteria);

        $filename = 'information_' . date('d.m.Y') . '.xls';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $this->export('php://output', $entities, $filter);
    }

    private function export($file, array $entities, $filter)
    {

        $operatorName = $entities[0]->tour->operator ? $entities[0]->tour->operator->name : '';
        $dateStart = (new \DateTime($filter['start']))->format('d.m.Y');
        $dateEnd = (new \DateTime($filter['end']))->format('d.m.Y');

        // Instantiate a new PHPExcel object
        $phpExcel = new \PHPExcel();
        // Set the active Excel worksheet to sheet 0
        $phpExcel->setActiveSheetIndex(0);
        // Insert first row
        $phpExcel->getActiveSheet()->mergeCells('A1:D1');
        $phpExcel->getActiveSheet()->getCell('A1')->setValue("Информация для анализа");
        $phpExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);

        $phpExcel->getActiveSheet()->mergeCells('A2:D2');
        $phpExcel->getActiveSheet()->getCell('A2')->setValue("{$operatorName} период с «{$dateStart}» по «{$dateEnd}»");
        
        // Initialise the Excel row number
        $rowCount = 3;
        //start of printing column names as names
        $column = 'A';
        $columns = [
            ['Порядковый номер'],
            ['ФИО туриста'],
            ['Телефон'],
            ['ТА'],
            ['Ф.И. менеджера'],
            ['Предоплата'],
            ['Предоплата при бронировании тура'],
            ['Стоимость тура на момент покупки тура'],
            ['Дата окончательной оплаты тура'],
            ['Период тура'],
        ];
        foreach ($columns as $data) {
            $phpExcel->getActiveSheet()->setCellValue($column . $rowCount, $data[0]);
            if (isset($data['width']))
            {
                $phpExcel->getActiveSheet()->getColumnDimension($column)->setWidth($data['width']);
            } else {
                $phpExcel->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
            }
            $column++;
        }
        // Set bold
        $phpExcel->getActiveSheet()->getStyle("A{$rowCount}:{$column}{$rowCount}")->getFont()->setBold(true);

        //start while loop to get data
        $rowCount++;
        $num = 1;
        foreach ($entities as $entity) {
            $column = 'A';

            $periodStart = \Yii::app()->dateFormatter->format('dd.MM.yyyy', $entity->tour->startDate);
            $periodEnd = \Yii::app()->dateFormatter->format('dd.MM.yyyy', $entity->tour->endDate);
            $paidAt = \Yii::app()->dateFormatter->format('dd.MM.yyyy', $entity->tour->paidAt);

            $row = [
                $num,
                $entity->fullName,
                $entity->phone,
                $entity->tour->touragent->name,
                $entity->getManager()->name,
                $entity->tour->prepayment,
                $entity->tour->bookingPrepaymentPaid,
                $entity->tour->price,
                $paidAt,
                "{$periodStart} - {$periodEnd}",
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
            $num++;
        }

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
        if (!empty($filter['touroperator']) && !in_array(-1, $filter['touroperator']))
        {
            $criteria->addInCondition('tour.operatorId', $filter['touroperator']);
        }
        if (!empty($filter['touragent']) && !in_array(-1, $filter['touragent']))
        {
            $criteria->addInCondition('tour.touragentId', $filter['touragent']);
        }
    }
}