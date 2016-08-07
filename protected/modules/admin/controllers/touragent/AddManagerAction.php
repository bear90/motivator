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
use application\modules\admin\models\forms;
use application\models\Touragent;
use application\models\TouragentManager as TouragentManagerEntity;

class AddManagerAction extends \CAction
{
    public function run($id)
    {
        $touragent = Touragent::model()->findByPk($id);
        $formEntity = new forms\TouragentManager();

        if (\Yii::app()->request->isPostRequest)
        {
            $formEntity->attributes = (array) \Yii::app()->request->getPost('TouragentManager');

            if($formEntity->validate())
            {
                $entity = new TouragentManagerEntity;
                $entity->attributes = $formEntity->attributes;
                $entity->touragentId = $touragent->id;

                $model = new TouragentManager($entity);
                $model->save();

                \Yii::app()->user->setFlash('message', "Запись добавлена успешно.");
                $this->controller->redirect(\Yii::app()->createUrl("/admin/touragent/manager/{$id}"));
                return;
            }
        }

        $this->controller->render('add-manager', [
            'touragent' => $touragent,
            'form' => new \CForm('application.modules.admin.views.forms.touragent-manager', $formEntity)
        ]);
    }
}