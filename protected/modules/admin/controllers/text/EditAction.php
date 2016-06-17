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

namespace application\modules\admin\controllers\text;

use application\modules\admin\models\Entity\TextEntity;
use application\modules\admin\models\Text;

class EditAction extends \CAction
{
    public function run($id = null)
    {
        $page = TextEntity::model()->findByPk($id);

        if (\Yii::app()->request->isPostRequest)
        {
            $attributes = (array) \Yii::app()->request->getPost('Text');

            $text = new Text($page);
            $text->save($attributes);

            \Yii::app()->user->setState('message', "Запись изменена успешно.");
            $this->controller->redirect(\Yii::app()->createUrl('/admin/text'));
            return;
        }

        $this->controller->render('edit', [
            'page' => $page
        ]);
    }
}