<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\defines\tourist\Helper;

class SettimerAction extends \CAction
{

    public function run($id)
    {
        $counterDate = new \DateTime(\Yii::app()->request->getPost('counterDate'));
        
        $data = [
            'counterReason' => (int) \Yii::app()->request->getPost('counterReason'),
            'counterDate' => $counterDate->format("Y-m-d H:i:s")
        ];
        $helper = new Helper();
        $tourist = $helper->update($id, $data);

        $this->controller->redirect('/user/dashboard/' . $tourist->id . '?tab=tab5');
    }
}