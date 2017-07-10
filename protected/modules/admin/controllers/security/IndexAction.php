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

namespace application\modules\admin\controllers\security;

use application\models\Entity;
use application\models\entities;
use application\modules\admin\models\forms;
use application\models\defines\UserRole;

class IndexAction extends \CAction
{
    public function run($id = null)
    {
        $isPost = \Yii::app()->request->isPostRequest;
        $action = $isPost ? \Yii::app()->request->getParam('action') : null;

        $form = new forms\PasswordGeneratorForm();

        if ($action == 'generate')
        {
            $n = (int) \Yii::app()->request->getPost('count');
            for ($i=0; $i<$n; $i++) {
                $model = new Entity\User();
                $attributes = [
                    'password' => $model->generatePassword(8),
                    'roleId' => UserRole::MANAGER
                ];
                $model->save($attributes);
            }

            $message = \Yii::t('front', 'n==1#пароль|n<5#пароля|n>4#паролей', $n);
            \Yii::app()->user->setFlash('message', "Сгенерировано {$n} {$message}.");
            
            $this->controller->redirect(\Yii::app()->createUrl('/admin/security'));
            return;
        }

        $entities = entities\User::model()->findAllByAttributes([
            'roleId' => UserRole::MANAGER
        ]);
        
        $this->controller->render('index', [
            'form' => new \CForm('application.modules.admin.views.forms.password-generate-form', $form),
            'entities' => $entities,
            'message' => \Yii::app()->user->getFlash('message', ''),
            'error' => \Yii::app()->user->getFlash('error', ''),
        ]);
    }
}
