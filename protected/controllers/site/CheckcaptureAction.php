<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\site;

use application\models\forms;


class CheckcaptureAction extends \CAjaxAction
{
    public function doRun()
    {
        $taskForm = new forms\TaskForm();
        $taskForm->verifyCode = \Yii::app()->request->getParam('verifyCode');

        return [
            'valid' => $taskForm->validate(['verifyCode'])
        ];
    }
}