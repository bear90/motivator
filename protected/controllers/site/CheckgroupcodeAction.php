<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\site;

use application\models\Tourist;


class CheckgroupcodeAction extends \CAjaxAction
{
    public function doRun()
    {
        $groupCode = (int) \Yii::app()->request->getPost('groupCode');
        $valid = Tourist::model()->exists('id = :id', ['id' => $groupCode]);

        return [
            'valid' => $valid
        ];
    }
}