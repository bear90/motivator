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

namespace application\modules\admin\controllers\template;

use application\models\Entity;
use application\models\entities;

class EditAction extends \CAction
{
    public function run($id = null)
    {
        $template = entities\Template::model()->findByPk($id);

        if (\Yii::app()->request->isPostRequest)
        {
            $attributes = (array) \Yii::app()->request->getPost('Template');

            $template = new Entity\Template($template);
            $template->save($attributes);

            \Yii::app()->user->setFlash('message', "Запись изменена успешно.");
            $this->controller->redirect(\Yii::app()->createUrl('/admin/template'));
            return;
        }

        $this->controller->render('edit', [
            'template' => $template
        ]);
    }
}