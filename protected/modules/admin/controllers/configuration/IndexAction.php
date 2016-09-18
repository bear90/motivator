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

namespace application\modules\admin\controllers\configuration;


use application\modules\admin\models\forms;
use application\models\User;

class IndexAction extends \CAction
{
    public function run()
    {
        $formEntity = new forms\Password();

        if (\Yii::app()->request->isPostRequest)
        {
            $formEntity->password = \Yii::app()->request->getPost('password');
            $formEntity->password2 = \Yii::app()->request->getPost('password2');

            if($formEntity->validate())
            {
                $entity = User::model()->findByPk(\Yii::app()->user->model->id);
                $entity->password = $formEntity->password;
                $entity->save();

                \Yii::app()->user->setFlash('message', "Пароль успешно изменен.");
                $this->controller->redirect(\Yii::app()->createUrl('/admin/configuration'));
            }
        }

        $this->controller->render('index', [
            'message' => \Yii::app()->user->getFlash('message'),
            'passwordForm' => new \CForm('application.modules.admin.views.forms.password', $formEntity)
        ]);
    }
}