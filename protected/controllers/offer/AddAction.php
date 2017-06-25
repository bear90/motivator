<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\offer;
use application\models\Entity;
use application\models\entities;

class AddAction extends \CAction
{
    public function run()
    {
        $attributes = \Yii::app()->request->getPost('offer');
        $attributes['createdBy'] = \Yii::app()->user->model->id;

        $offer = new Entity\Offer();
        $offer->save($attributes);

        // Update price
        $task = entities\Task::model()->findByPk($attributes['taskId']);
        $model = new Entity\Task($task);
        $model->setPrice($offer->data()->priceType, $offer->data()->price);

        \Yii::app()->user->setFlash('offerForTask', $attributes['taskId']);
        
        $this->controller->redirect('/#offer_' . $offer->data()->id);
    }
}
