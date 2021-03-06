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

namespace application\modules\admin\controllers\name;


use application\models\Entity;
use application\models\entities;

class DeleteAction extends \CAction
{
    public function run($id = null)
    {
        $entity = entities\UserName::model()->findByPk($id);
        $model = new Entity\User\Name($entity);
        $model->delete();

        \Yii::app()->user->setFlash('message', "Запись удалена успешно.");
        $this->controller->redirect(\Yii::app()->createUrl('/admin/name'));
        return;
    }
}