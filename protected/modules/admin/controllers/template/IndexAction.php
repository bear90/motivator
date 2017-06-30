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


use application\models\entities;

class IndexAction extends \CAction
{
    public function run()
    {
        $templates = entities\Template::model()->findAll(['order' => 'position']);
        
        
        $this->controller->render('index', [
            'templates' => $templates,
            'message' => \Yii::app()->user->getFlash('message', '')
        ]);
    }
}