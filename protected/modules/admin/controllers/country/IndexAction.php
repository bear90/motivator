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

namespace application\modules\admin\controllers\country;

use application\models\Entity;
use application\models\entities;
use application\modules\admin\models\forms;

class IndexAction extends \CAction
{
    public function run($id = null)
    {
        $form = new forms\CountryForm();

        if (\Yii::app()->request->isPostRequest)
        {
            $attributes = (array) \Yii::app()->request->getPost('country');
            $form->attributes = $attributes;
            if($form->validate())
            {
                $model = new Entity\Country();
                $model->save($form->attributes);

                \Yii::app()->user->setFlash('message', "Запись добавлена успешно.");
                $form->attributes = [];
            }
        }

        $criteria = new \CDbCriteria(['order' => 'name']);
        $entities = entities\Country::model()->findAll($criteria);
        
        $this->controller->render('index', [
            'form' => new \CForm('application.modules.admin.views.forms.country-form', $form),
            'entities' => $entities,
            'message' => \Yii::app()->user->getFlash('message', ''),
            'error' => \Yii::app()->user->getFlash('error', ''),
        ]);
    }
}
