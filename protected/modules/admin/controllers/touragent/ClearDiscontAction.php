<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\Tourist;
use application\models\Touragent;
use application\models\defines\TouristStatus;

class ClearDiscontAction extends \CAction
{

    public function run($id = null)
    {
        $command = \Yii::app()->db->createCommand();
        $command->delete('discount_transaction', 'sourceTouristId IS NULL OR targetTouristId IS NULL');

        \Yii::app()->user->setState('message', "Таблица учёта баланса очищена от лишних записей");

        $this->controller->redirect('/admin/touragent');
    }
}