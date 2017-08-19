<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\entities\TouragentOffer;
use application\models\entities\User;

class ResetAction extends \CAction
{

    public function run($id)
    {
        TouragentOffer::model()->deleteAllByAttributes([
            'touragentId' => $id
        ]);
        \Yii::app()->user->setFlash('message', "Статистика обнулена.");
        $this->controller->redirect(\Yii::app()->createUrl("/admin/touragent"));
    }
}