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

use application\modules\admin\models\forms;
use application\models\Entity\Touragent;

use application\models\Entity\User;
use application\models\defines\UserRole;

class AddAction extends \CAction
{
    public function run()
    {
        $touragent = new Touragent;
        $formEntity = new forms\TouragentForm('create');

        if (\Yii::app()->request->isPostRequest)
        {
            $formEntity->attributes = \Yii::app()->request->getPost('Touragent');

            if($formEntity->validate())
            {
                // Create User
                $user = new User;
                $user->create($formEntity->password, UserRole::MANAGER);

                // Save data
                $attributes = $formEntity->attributes;
                $attributes['userId'] = $user->data()->id;
                $touragent->save($attributes);

                \Yii::app()->user->setState('message', "Запись добавлена успешно.");
                $this->controller->redirect(\Yii::app()->createUrl("/admin/touragent"));
                return;
            }
        }

        $this->controller->render('add', [
            'touragent' => $touragent->data(),
            'touragentForm' => new \CForm('application.modules.admin.views.forms.touragent-form', $formEntity)
        ]);
    }
}