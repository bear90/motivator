<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\Touragent;

class IndexAction extends \CAction
{

    public function run($id = null)
    {
        $touragents = Touragent::model()->findAll();
        $message = '';

        if (\Yii::app()->user->hasState('message'))
        {
            $message = \Yii::app()->user->getState('message');
            \Yii::app()->user->setState('message', null);
        }

        $this->controller->render('index', [
            'touragents' => $touragents,
            'message' => $message
        ]);
    }
}