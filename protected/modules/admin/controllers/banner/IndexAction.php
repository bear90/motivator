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


use application\models\BannerSite;
use application\modules\admin\models\forms;

class IndexAction extends \CAction
{
    public function run($id = null)
    {
        $formEntity = new forms\BannerSite();
        $formBanner = new forms\Banner();

        if (\Yii::app()->request->isPostRequest)
        {
            $formEntity->attributes = (array) \Yii::app()->request->getPost('BannerSite');

            if($formEntity->validate())
            {
                $entity = new BannerSite();
                $entity->attributes = $formEntity->attributes;
                $entity->save();

                \Yii::app()->user->setFlash('message', "Рекламный блок добавлен успешно.");
                $this->controller->redirect(\Yii::app()->createUrl("/admin/banner"));
                return;
            }
        }
        
        $this->controller->render('index', [
            'entities' => BannerSite::model()->findAll(),
            'message' => \Yii::app()->user->getFlash('message', ''),
            'error' => \Yii::app()->user->getFlash('error', ''),
            'form' => new \CForm('application.modules.admin.views.forms.banner-site', $formEntity),
            'formBanner' => new \CForm('application.modules.admin.views.forms.banner', $formBanner)
        ]);
    }
}
