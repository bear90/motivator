<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\defines\tour\Helper;

class OrdertourAction extends \CAction
{

    public function run()
    {
        $startDate = new \DateTime(\Yii::app()->request->getPost('startDate'));
        $endDate = new \DateTime(\Yii::app()->request->getPost('endDate'));
        $data = [
            'touragentId' => (int) \Yii::app()->request->getPost('touragentId'),
            'city' => (array) \Yii::app()->request->getPost('city'),
            'startDate' => $startDate->format("Y-m-d H:i:s"),
            'endDate' => $endDate->format("Y-m-d H:i:s"),
        ];
        $helper = new Helper();
        $helper->create($data);

        \Yii::app()->user->setState('tour::created', true);

        $this->controller->redirect('/user/dashboard#success');
    }
}