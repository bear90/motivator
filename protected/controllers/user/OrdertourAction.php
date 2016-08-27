<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\defines\tour\Helper;
use application\models\defines\tourist\Helper as TouristHelper;

class OrdertourAction extends \CAction
{

    public function run()
    {
        $touristData = \Yii::app()->request->getPost('tourist');
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

        if($touristData !== null)
        {
            $helper = new TouristHelper();
            $id = \Yii::app()->user->model->tourist->id;
            $helper->update($id, $touristData);

            \Tool::informTourist(\Yii::app()->user->model->tourist, 'order_tour');
        }

        \Yii::app()->user->setState('tour::created', true);

        $this->controller->redirect('/user/dashboard');
    }
}