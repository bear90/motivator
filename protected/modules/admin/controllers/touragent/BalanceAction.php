<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\Touragent;
//use application\models\User;
use application\models\TouragentParam;
use application\models\TouragentOperator;
use application\modules\admin\models\forms;
use application\components\MCForm;

class BalanceAction extends \CAction
{

    public $menuKey = 'balance';

    public function run($id = null)
    {
        $touragents = Touragent::model()->findAll(['with' => ['tourists2']]);
        $message = '';

        if (\Yii::app()->user->hasState('message'))
        {
            $message = \Yii::app()->user->getState('message');
            \Yii::app()->user->setState('message', null);
        }

        $this->controller->render('balance', [
            'touragents' => $touragents,
            'message' => $message,
            'balance' => $this->getBalance($touragents)
        ]);
    }

    private function getBalance(array $touragents)
    {
        $cmd = \Yii::app()->db->createCommand();
        $cmd->select(['sourceTouragentId', 'targetTouragentId', 'amount'])
            ->from('discount_transaction')
            ->where('sourceTouragentId != targetTouragentId');

        $balance = [];
        foreach ($cmd->queryAll() as $row) {
            $a = intval($row['sourceTouragentId']);
            $b = intval($row['targetTouragentId']);
            $balance[] = [
                'type' => "{$a}-{$b}",
                'amount' => intval($row['amount']),
            ];
        }

        return $balance;
    }
}