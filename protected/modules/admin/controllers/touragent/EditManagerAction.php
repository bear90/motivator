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
use application\modules\admin\models\forms;
use application\models\Touragent;

class EditManagerAction extends \CAction
{
    public function run($id)
    {
        $entity = TouragentManagerEntity::model()->findByPk($id);

        $touragentId = $entity->touragentId;
        $touragent = Touragent::model()->findByPk($touragentId);

        $formEntity = new forms\TouragentManager();
        $formEntity->attributes = $entity->attributes;

        if (\Yii::app()->request->isPostRequest)
        {
            $formEntity->attributes = (array) \Yii::app()->request->getPost('TouragentManager');

            if($formEntity->validate())
            {
                $model = new TouragentManager($entity);
                $model->save($formEntity->attributes);

                \Yii::app()->user->setFlash('message', "Запись изменена успешно.");
                $this->controller->redirect(\Yii::app()->createUrl("/admin/touragent/manager/{$touragentId}"));
                return;
            }
        }

        $this->controller->render('edit-manager', [
            'touragent' => $touragent,
            'form' => new \CForm('application.modules.admin.views.forms.touragent-manager', $formEntity)
        ]);
    }
}