<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\site;

use application\models\Tourist;
use application\models\defines\TouristStatus;


class CheckgroupcodeAction extends \CAjaxAction
{
    public function doRun()
    {
        $pid = (int) \Yii::app()->request->getPost('groupCode');
        $params = ['id' => $pid, 'status' => TouristStatus::GETTING_DISCONT];
        $valid = Tourist::model()->exists('id = :id AND statusId = :status', $params);

        return [
            'valid' => $valid
        ];
    }
}