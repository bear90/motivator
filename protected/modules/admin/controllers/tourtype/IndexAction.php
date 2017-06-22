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

class IndexAction extends \CAction
{
    public function run($id = null)
    {
        $form = new forms\TourTypeForm();

        if (\Yii::app()->request->isPostRequest)
        {
            $attributes = (array) \Yii::app()->request->getPost('tourtype');
            $form->attributes = $attributes;
            if($form->validate())
            {
                $model = new Entity\Tour\Type();
                $model->save($form->attributes);

                \Yii::app()->user->setFlash('message', "Запись добавлена успешно.");
                $form->attributes = [];
            }
        }

        $entities = entities\TourType::model()->findAll();
        
        $this->controller->render('index', [
            'form' => new \CForm('application.modules.admin.views.forms.tourtype-form', $form),
            'entities' => $entities,
            'message' => \Yii::app()->user->getFlash('message', ''),
            'error' => \Yii::app()->user->getFlash('error', ''),
        ]);
    }
}
