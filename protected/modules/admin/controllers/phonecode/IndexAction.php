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

namespace application\modules\admin\controllers\phonecode;

use application\models\Entity;
use application\models\entities;
use application\models\entities\Configuration;
use application\modules\admin\models\forms;
use application\models\defines;

class IndexAction extends \CAction
{
    public function run($id = null)
    {
        $isPost = \Yii::app()->request->isPostRequest;
        
        $form = new forms\PhoneCodeFilterForm();

        if ($isPost) {
            $form->date_from = \Yii::app()->request->getPost('date_from');
            $form->date_to = \Yii::app()->request->getPost('date_to');
        }

        $criteria = new \CDbCriteria();
        $criteria->condition = 'type = :ad';
        $criteria->params['ad'] = defines\Code\Type::PHONE;
        $entities_count = entities\Code::model()->count($criteria);
        
        $this->controller->render('index', [
            'form' => new \CForm('application.modules.admin.views.forms.phonecode-filter-form', $form),
            'entities_count' => $entities_count,
            'message' => \Yii::app()->user->getFlash('message', ''),
            'error' => \Yii::app()->user->getFlash('error', ''),
        ]);
    }
}
