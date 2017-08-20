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

namespace application\controllers\api;

use application\models\entities;
use application\models\Entity;

class TouragentOffersAction extends \CApiAction
{
    public function doRun()
    {
        $isAllowed = \Yii::app()->user->isManager() || \Yii::app()->user->isAdmin();

        // Restrict access for unknown agents
        if (!$isAllowed)
        {
            throw new \CHttpException(404, 'Not found');
        }

        $attributes = \Yii::app()->request->getPost('Filter');
        $id = intval($attributes['touragentId']);
        $from = new \DateTime($attributes['from']);
        $to = new \DateTime($attributes['to']);

        $entities = Entity\Touragent\Offer\Repository::findAll($id, $from, $to);

        $data = [
            'entities' => $entities,
            'block1' => $this->getBlock1($entities),
            'block2' => $this->getBlock2($entities)
        ];

        $widget = $this->controller->renderPartial('stat', $data, true);

        return [
            'widget' => $widget
        ];
    }

    private function getBlock1($entities) 
    {
        $data = [];
        foreach ($entities as $entity) {
            $date = new \DateTime($entity->createdAt);
            $date = $date->format('d.m.Y');
            if (array_key_exists($date, $data)) {
                $data[$date]++;
            } else {
                $data[$date] = 1;
            }
        }

        return $data;
    }

    private function getBlock2($entities) 
    {
        $data = [];
        foreach ($entities as $entity) {
            $date = new \DateTime($entity->createdAt);
            $data[] = $date->format('d.m.Y – H:i');
        }
        return $data;
    }
}