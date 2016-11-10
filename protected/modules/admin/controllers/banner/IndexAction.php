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

namespace application\modules\admin\controllers\banner;


use application\modules\admin\models\forms;

class IndexAction extends \CAction
{
    public function run($id = null)
    {
        $formEntity = new forms\BannerSite();
        /*$pages = TextEntity::model()->findAll(['order' => 'position']);
        $message = '';

        if (\Yii::app()->user->hasState('message'))
        {
            $message = \Yii::app()->user->getState('message');
            \Yii::app()->user->setState('message', null);
        }*/
        
        $this->controller->render('index', [
            /*'pages' => $pages,*/
            'message' => \Yii::app()->user->getFlash('message', ''),
            'form' => new \CForm('application.modules.admin.views.forms.banner-site', $formEntity)
        ]);
    }
}