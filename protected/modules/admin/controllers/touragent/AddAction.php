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

use application\models\entities;
use application\models\Entity;
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
            
            //Check User by password
            $user = entities\User::model()->findByAttributes(['password' => $formEntity->password]);
            
            //var_dump($user, $user->touragent);die();

            if ($user && is_null($user->touragent)) {
                $formEntity->userId = $user->id;
            }

            if($formEntity->validate())
            {

                // Create User
                if ($user && is_null($user->touragent)) {
                    $user = new Entity\User($user);
                } else {
                    $user = new Entity\User;
                    $user->create($formEntity->password, UserRole::MANAGER);
                }

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