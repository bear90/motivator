<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\feedback;

use application\models\entities;

class DeleteAction extends \CAction
{

    public function run($id)
    {

        entities\Feedback::model()->deleteByPk($id);
        \Yii::app()->user->setFlash('message', "Отзыв удален.");
        $this->controller->redirect(\Yii::app()->createUrl("/admin/feedback"));
    }
}