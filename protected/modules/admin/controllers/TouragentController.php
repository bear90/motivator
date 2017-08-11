<?php

namespace application\modules\admin\controllers;

use application\models\TouragentParam;
use application\modules\admin\models\forms;

class TouragentController extends AdminController {

    public $jsModule = 'touragent';

    public function actions(){
        return [
            'index' => 'application\\modules\\admin\\controllers\\touragent\\IndexAction',
            'balance' => 'application\\modules\\admin\\controllers\\touragent\\BalanceAction',
            'add' => 'application\\modules\\admin\\controllers\\touragent\\AddAction',
            'edit' => 'application\\modules\\admin\\controllers\\touragent\\EditAction',
            'delete' => 'application\\modules\\admin\\controllers\\touragent\\DeleteAction',
            'clear' => 'application\\modules\\admin\\controllers\\touragent\\ClearAction',
            'clear-discont' => 'application\\modules\\admin\\controllers\\touragent\\ClearDiscontAction',
            'manager' => 'application\\modules\\admin\\controllers\\touragent\\ManagerAction',
            'add-manager' => 'application\\modules\\admin\\controllers\\touragent\\AddManagerAction',
            'edit-manager' => 'application\\modules\\admin\\controllers\\touragent\\EditManagerAction',
            'delete-manager' => 'application\\modules\\admin\\controllers\\touragent\\DeleteManagerAction',
            'reset-bonus' => 'application\\modules\\admin\\controllers\\touragent\\ResetBonusAction',
        ];
    }

    public function getCountOfWeeks($year)
    {
        $date = new \DateTime;
        $date->setISODate($year, 53);

        return ($date->format("W") === "53" ? 53 : 52);
    }

    public function getTouragentParams($year, $touragentId)
    {
        $formModels = [];
        $_entities = TouragentParam::model()->findAllByAttributes([
            'touragentId' => $touragentId,
            'year' => $year
        ]);

        $entities = [];
        foreach ($_entities as $object)
        {
            $entities[$object->week] = $object;
        }

        for ($i=1; $i<=$this->getCountOfWeeks($year); $i++)
        {
            $form = new forms\TouragentParam();
            if (isset($entities[$i]))
            {
                $form->attributes = $entities[$i]->attributes;
            }

            $formModels[] = $form;
        }

        return $formModels;
    }

    public function getDateLabel($year, $week)
    {
        $week = str_pad($week, 2, '0', STR_PAD_LEFT);

        $date = date('Y-m-d', strtotime("{$year}W{$week}"));
        $firstDayOfYear = new \DateTime("{$year}-01-01");
        $lastDayOfYear = new \DateTime("{$year}-12-31");
        $firstDay = new \DateTime($date);
        $lastDay = new \DateTime($date);
        $lastDay->modify('+6 day');

        if ($firstDay > $firstDayOfYear && $week==1){
            $firstDay = $firstDayOfYear;
        }
        if ($lastDay > $lastDayOfYear && $week>51){
            $lastDay = $lastDayOfYear;
        }

        return $firstDay->format('d.m') . ' - ' . $lastDay->format('d.m');
    }

//    public function actionError() {
//        $error = Yii::app()->errorHandler->error;
//die("ERROR INDEX: ");
//        var_dump(Yii::app()->request);
//        /**
//        code: the HTTP status code (e.g. 403, 500);
//        type: the error type (e.g. CHttpException, PHP Error);
//        message: the error message;
//        file: the name of the PHP script file where the error occurs;
//        line: the line number of the code where the error occurs;
//        trace: the call stack of the error;
//        source: the context source code where the error occurs.
//         */
//        if ($error) {
//            if (Yii::app()->request->isAjaxRequest) {
//                echo $error['message'];
//            } else {
//                //$this->render('error', $error);
//                print_r($error);
//            }
//        }
//    }
}