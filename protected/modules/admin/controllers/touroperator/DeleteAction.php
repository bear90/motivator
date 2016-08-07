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

namespace application\modules\admin\controllers\touroperator;


use application\modules\admin\models\Touroperator;
use application\models\Touroperator as TouroperatorEntity;

class DeleteAction extends \CAction
{
    public function run($id = null)
    {
        $entity = TouroperatorEntity::model()->findByPk($id);
        $model = new Touroperator($entity);
        $model->delete();

        \Yii::app()->user->setFlash('message', "Запись удалена успешно.");
        $this->controller->redirect(\Yii::app()->createUrl('/admin/touroperator'));
        return;
    }
}