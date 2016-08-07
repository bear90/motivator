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
use application\modules\admin\models\forms;

class AddAction extends \CAction
{
    public function run()
    {
        $formEntity = new forms\Touroperator();

        if (\Yii::app()->request->isPostRequest)
        {
            $formEntity->attributes = (array) \Yii::app()->request->getPost('Touroperator');

            if($formEntity->validate())
            {
                $model = new Touroperator();
                $model->save($formEntity->attributes);

                \Yii::app()->user->setFlash('message', "Запись добавлена успешно.");
                $this->controller->redirect(\Yii::app()->createUrl('/admin/touroperator'));
                return;
            }
        }

        $this->controller->render('add', [
            'form' => new \CForm('application.modules.admin.views.forms.touroperator', $formEntity)
        ]);
    }
}