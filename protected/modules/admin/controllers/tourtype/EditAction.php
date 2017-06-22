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

namespace application\modules\admin\controllers\tourtype;


use application\models\Entity;
use application\models\entities;
use application\modules\admin\models\forms;

class EditAction extends \CAction
{
    public function run($id)
    {
        $entity = entities\TourType::model()->findByPk($id);

        $formEntity = new forms\TourTypeForm();
        $formEntity->attributes = $entity->attributes;

        if (\Yii::app()->request->isPostRequest)
        {
            $formEntity->attributes = (array) \Yii::app()->request->getPost('tourtype');

            if($formEntity->validate())
            {
                $model = new Entity\Tour\Type($entity);
                $model->save($formEntity->attributes);

                \Yii::app()->user->setFlash('message', "Запись изменена успешно.");
                $this->controller->redirect(\Yii::app()->createUrl('/admin/tourtype'));
                return;
            }
        }

        $this->controller->render('edit', [
            'entity' => $entity,
            'form' => new \CForm('application.modules.admin.views.forms.tourtype-form', $formEntity)
        ]);
    }
}
