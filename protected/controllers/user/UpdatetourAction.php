<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\controllers\user;


use application\models\defines\tour\Helper;

class UpdatetourAction extends \CAction
{

    public function run($id)
    {
        $offer = \Yii::app()->request->getPost('offer');
        $manager = \Yii::app()->user->getState('manager');
        
        $data = [
            'offer' => $offer,
            'managerId' => $manager->id
        ];
        $helper = new Helper();
        $tour = $helper->update($id, $data);

        $tourist = Tourist::model()->findByPk($tour->touristId);
        \Tool::informTourist($tourist, 'exchange_tour');

        $this->controller->redirect('/user/dashboard/' . $tour->touristId);
    }
}