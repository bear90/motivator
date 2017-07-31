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
use application\modules\admin\models\forms;

class IndexAction extends \CAction
{
    public function run($id = null)
    {
        $formMale = new forms\NameForm();
        $formMale->type = 1;
        $formFemale = new forms\NameForm();
        $formFemale->type = 2;

        if (\Yii::app()->request->isPostRequest)
        {
            $attributes = (array) \Yii::app()->request->getPost('username');

            switch ($attributes['type']) {
                case 1:
                    $formMale->attributes = $attributes;
                    if($formMale->validate())
                    {
                        $model = new Entity\User\Name();
                        $model->save($formMale->attributes);

                        \Yii::app()->user->setFlash('message', "Запись добавлена успешно.");
                        $formMale->attributes = [];
                    }
                    break;
                case 2:
                    $formFemale->attributes = $attributes;
                    if($formFemale->validate())
                    {
                        $model = new Entity\User\Name();
                        $model->save($formFemale->attributes);

                        \Yii::app()->user->setFlash('message', "Запись добавлена успешно.");
                        $formFemale->attributes = [];
                    }
                    break;
            }
        }

        $criteria = new \CDbCriteria(['order' => 'name']);
        $maleEntities = entities\UserName::model()->findAllByAttributes(['type' => 1], $criteria);
        $femaleEntities = entities\UserName::model()->findAllByAttributes(['type' => 2], $criteria);
        
        $this->controller->render('index', [
            'formMale' => new \CForm('application.modules.admin.views.forms.name-form', $formMale),
            'formFemale' => new \CForm('application.modules.admin.views.forms.name-form', $formFemale),
            'male' => $maleEntities,
            'female' => $femaleEntities,
            'message' => \Yii::app()->user->getFlash('message', ''),
            'error' => \Yii::app()->user->getFlash('error', ''),
        ]);
    }
}