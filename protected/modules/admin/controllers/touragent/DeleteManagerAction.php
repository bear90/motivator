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

namespace application\modules\admin\controllers\touragent;


use application\modules\admin\models\TouragentManager;
use application\models\TouragentManager as TouragentManagerEntity;

class DeleteManagerAction extends \CAction
{
    public function run($id = null)
    {
        $entity = TouragentManagerEntity::model()->findByPk($id);

        $touragentId = $entity->touragentId;
        
        $model = new TouragentManager($entity);
        $model->delete();

        \Yii::app()->user->setFlash('message', "Запись удалена успешно.");
        $this->controller->redirect(\Yii::app()->createUrl("/admin/touragent/manager/{$touragentId}"));
        return;
    }
}