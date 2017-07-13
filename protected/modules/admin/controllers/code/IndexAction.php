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

namespace application\modules\admin\controllers\code;

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

        $form = new forms\CodeUpdateForm();
        $generateForm = new forms\CodeGeneratorForm();

        if ($action == 'generate')
        {
            $n = (int) \Yii::app()->request->getPost('count');
            for ($i=0; $i<$n; $i++) {
                $model = new Entity\Code();
                $attributes = [
                    'code' => Entity\User::generatePassword(6),
                ];
                $model->save($attributes);
            }

            $message = \Yii::t('front', 'n==1#код|n<5#кода|n>4#кодов', $n);
            \Yii::app()->user->setFlash('message', "Сгенерировано {$n} {$message}.");
            
            $this->controller->redirect(\Yii::app()->createUrl('/admin/code'));
            return;
        }

        $entities = entities\Code::model()->findAll();
        
        $this->controller->render('index', [
            'form' => new \CForm('application.modules.admin.views.forms.code-update-form', $form),
            'generateForm' => new \CForm('application.modules.admin.views.forms.code-generate-form', $generateForm),
            'entities' => $entities,
            'message' => \Yii::app()->user->getFlash('message', ''),
            'error' => \Yii::app()->user->getFlash('error', ''),
        ]);
    }
}
