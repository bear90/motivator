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
use application\modules\admin\models\forms;

class EditAction extends \CAction
{
    public function run($id)
    {
        $entity = TouroperatorEntity::model()->findByPk($id);

        $formEntity = new forms\Touroperator();
        $formEntity->attributes = $entity->attributes;

        if (\Yii::app()->request->isPostRequest)
        {
            $formEntity->attributes = (array) \Yii::app()->request->getPost('Touroperator');

            if($formEntity->validate())
            {
                $model = new Touroperator($entity);
                $model->save($formEntity->attributes);

                \Yii::app()->user->setFlash('message', "Запись изменена успешно.");
                $this->controller->redirect(\Yii::app()->createUrl('/admin/touroperator'));
                return;
            }
        }

        $this->controller->render('edit', [
            'form' => new \CForm('application.modules.admin.views.forms.touroperator', $formEntity)
        ]);
    }
}