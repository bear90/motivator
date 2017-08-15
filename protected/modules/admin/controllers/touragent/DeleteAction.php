<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\entities\Touragent;
use application\models\entities\User;

class DeleteAction extends \CAction
{

    public function run($id)
    {

        $touragent = Touragent::model()->findByPk($id);
        if ($touragent) {
            $touragent->delete();
            User::model()->deleteByPk($touragent->userId);
        }
        \Yii::app()->user->setFlash('message', "Турагент удален.");
        $this->controller->redirect(\Yii::app()->createUrl("/admin/touragent"));
    }
}