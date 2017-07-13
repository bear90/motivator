<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       17.06.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\controllers\code;

use application\models\defines\UserRole;
use application\models\entities;

class DeleteAction extends \CAction
{
    public function run($id = null)
    {
        $ids = \Yii::app()->request->getParam('code') ?: [];

        if ($id) {
            $entity = entities\Code::model()->findByPk($id);
            if($entity)
                $entity->delete();

            \Yii::app()->user->setFlash('message', "Запись удалена успешно.");
        } elseif($ids) {
            $criteria = new \CDbCriteria();
            $criteria->addInCondition('id', $ids);
            $entities = entities\Code::model()->deleteAll($criteria);

            \Yii::app()->user->setFlash('message', "Записи удалены успешно.");
        }
        
        $this->controller->redirect(\Yii::app()->createUrl('/admin/code'));
        return;
    }
}
