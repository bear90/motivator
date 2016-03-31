<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\defines\tour\Helper;

class RemovetourAction extends \CAction
{

    public function run($id)
    {
        $id = (int) \Yii::app()->request->getParam('id');

        $helper = new Helper();
        $helper->delete($id);

        $this->controller->redirect('/user/dashboard?tab=tab1');
    }
}