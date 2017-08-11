<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\entities\Touragent;

class DeleteAction extends \CAction
{

    public function run($id)
    {

        Touragent::model()->deleteByPk($id);
        \Yii::app()->user->setFlash('message', "Турагент удален.");
        $this->controller->redirect(\Yii::app()->createUrl("/admin/touragent"));
    }
}