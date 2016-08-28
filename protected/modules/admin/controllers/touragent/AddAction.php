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
use application\models\Touragent;
use application\models\User;
use application\models\defines\UserRole;
use application\models\TouragentOperator;
use application\modules\admin\models\TouragentManager;
use application\models\TouragentManager as TouragentManagerEntity;

class AddAction extends \CAction
{
    public function run()
    {
        $touragent = new Touragent;
        $formEntity = new forms\Touragent('create');

        if (\Yii::app()->request->isPostRequest)
        {
            $formEntity->attributes = \Yii::app()->request->getPost('Touragent');
            $formEntity->logo = \CUploadedFile::getInstance($formEntity,'logo');

            if($formEntity->validate())
            {
                // Create User
                $userEntity = new User;
                $userEntity->password = $formEntity->password;
                $userEntity->roleId = UserRole::MANAGER;
                $userEntity->save();
                
                // Save file
                if ($formEntity->logo)
                {
                    $storage = $touragent->getStorage();

                    
                    if (!is_dir($storage))
                    {
                        mkdir($storage, 0777, true);
                    }

                    $path = $storage.'/logo.'.$formEntity->logo->getExtensionName();
                    if ($formEntity->logo->saveAs($path))
                    {
                        $touragent->logo = 'logo.'.$formEntity->logo->getExtensionName();
                    }
                }
                // Save data
                $touragent->attributes = $formEntity->attributes;
                $touragent->userId = $userEntity->id;
                $touragent->save();

                if (!$touragent->hasErrors())
                {
                    // Save Touroperators
                    $touroperators = (array) \Yii::app()->request->getPost('Touroperator');

                    foreach ($touroperators as $touroperatorId) {
                        $entity = new TouragentOperator;
                        $entity->touragentId = $touragent->id;
                        $entity->touroperatorId = $touroperatorId;
                        $entity->save();
                    }

                    // Create Boss
                    $entity = new TouragentManagerEntity;
                    $entity->attributes = [
                        'name' => 'Руководитель',
                        'boss' => 1,
                        'touragentId' => $touragent->id
                    ];

                    $model = new TouragentManager($entity);
                    $model->save();

                    $touragent->refresh();
                }
                

                \Yii::app()->user->setState('message', "Запись добавлена успешно.");
                $this->controller->redirect(\Yii::app()->createUrl("/admin/touragent"));
                return;
            }
        }

        $this->controller->render('add', [
            'touragent' => $touragent,
            'touragentForm' => new \CForm('application.modules.admin.views.forms.touragent', $formEntity)
        ]);
    }
}