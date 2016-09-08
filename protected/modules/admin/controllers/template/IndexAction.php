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


use application\modules\admin\models\Entity\TemplateEntity;

class IndexAction extends \CAction
{
    public function run()
    {
        $templates = TemplateEntity::model()->findAll(['order' => 'position']);
        
        
        $this->controller->render('index', [
            'templates' => $templates,
            'message' => \Yii::app()->user->getFlash('message', '')
        ]);
    }
}