<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       04.08.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\controllers\site;

use application\models\entities;
use application\models\Entity;
use application\models\defines\Offer;


class ChangeOfferTypeAction extends \CApiAction
{
    public function doRun()
    {
        
        $id = (int) \Yii::app()->request->getParam('id');
        $type = \Yii::app()->request->getParam('type');

        $entity = entities\Offer::model()->findByPk($id);

        if (!$entity) {
            throw new \CHttpException(404, 'Not Found');
        }

        $model = new Entity\Offer($entity);

        if ($type == Offer\Type::FAVORITE) {
            $model->save(['type' => Offer\Type::FAVORITE]);
        } elseif ($type == Offer\Type::NOT_PRIORITY) {
            $model->save(['type' => Offer\Type::NOT_PRIORITY]);
        } else {
            throw new \CHttpException(400, 'Bad Request');
        }

        $taskEntity = entities\Task::model()->findByPk($entity->taskId, [
            'with' => ['offers' => ['order' => 'offers.type, offers.sort desc']]
        ]);
        $data = [
            'offers' => $taskEntity->offers,
            'taskId' => $taskEntity->id,
            'showContact' => true
        ];

        return [
            'updated' => $id,
            'widget' => $this->controller->renderPartial('partials/offer-list', $data, true, true)
        ];
    }
}