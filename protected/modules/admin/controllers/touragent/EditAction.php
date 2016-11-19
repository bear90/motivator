<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\Tourist;
use application\models\Touragent;
use application\models\defines\TouristStatus;

class EditAction extends \CAction
{

    public function run($id)
    {
        $touragent = Touragent::model()->findByPk($id, ['with' => 'tourists2']);
        $action = \Yii::app()->request->getParam('action');
        if ($touragent && $action) {
            if ($action != 'activate') {
                $touragent->status = 0;
                \Yii::app()->user->setState('message', "Турагент {$touragent->name} заблокирован.");
            } else {
                $touragent->status = 1;
                \Yii::app()->user->setState('message', "Турагент {$touragent->name} разблокирован.");
            }
            $touragent->save();
            $this->controller->redirect(\Yii::app()->createUrl("/admin/touragent"));
        }
    }
}