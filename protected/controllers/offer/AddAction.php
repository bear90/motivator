<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\offer;
use application\models\Entity;
use application\models\entities;
use application\models\defines;

class AddAction extends \CAction
{
    public function run()
    {
        $attributes = \Yii::app()->request->getPost('offer');
        $attributes['createdBy'] = \Yii::app()->user->model->id;

        $offer = new Entity\Offer();
        $this->setPrice($offer, $attributes['priceType'], $attributes['price']);
        unset($attributes['priceType'], $attributes['price']);
        $attributes['sort'] = $this->getSort($attributes['taskId']);
        $offer->save($attributes);

        // Update price
        $task = entities\Task::model()->findByPk($attributes['taskId']);
        $model = new Entity\Task($task);
        $model->setPrice($offer->data());

        \Yii::app()->user->setFlash('offerForTask', $attributes['taskId']);

        \Tool::sendEmailWithLayout($model->data(), 'add-offer', []);
        
        $this->controller->redirect('/#offer_' . $offer->data()->id);
    }

    private function getSort($taskId) {
        $sort = \Yii::app()->db->createCommand()
            ->select('max(sort)')
            ->from('tbl_offer')
            ->where('taskId = :id', ['id' => $taskId])
            ->queryScalar();
        return !empty($sort) ? $sort + 1 : 1;
    }

    public function setPrice(Entity\Offer $offer, array $type, array $price)
    {
        for ($i=0; $i<3; $i++) {
            if(isset($type[$i]) && !empty($price[$i])) {
                switch ($type[$i]) {
                    case defines\Offer\PriceType::GENERAL:
                        $offer->data()->price = $price[$i];
                        break;
                    case defines\Offer\PriceType::EARLY_BOOKING:
                        $offer->data()->earlyPrice = $price[$i];
                        break;
                    case defines\Offer\PriceType::LASTMINUTE_TOUR:
                        $offer->data()->lastMinPrice = $price[$i];
                        break;
                }
            }
        }
    }
}
