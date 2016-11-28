<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       28.11.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\controllers\banner;

use application\models\BannerSite;
use application\modules\admin\models\forms;

class UpdateAction extends \CAction
{
    public function run($id)
    {
        $entity = BannerSite::model()->findByPk($id);
        $formEntity = new forms\BannerSite();
        $formEntity->attributes = $entity->attributes;

        if (\Yii::app()->request->isPostRequest)
        {
            $formEntity->attributes = (array) \Yii::app()->request->getPost('BannerSite');
            if($formEntity->validate())
            {
                $entity->attributes = $formEntity->attributes;
                $entity->save();

                \Yii::app()->user->setFlash('message', "Рекламный блок изменён успешно.");
                $this->controller->redirect(\Yii::app()->createUrl("/admin/banner"));
                return;
            }
        }

        $this->controller->render('update', [
            'entity' => $entity,
            'form' => new \CForm('application.modules.admin.views.forms.banner-site', $formEntity)
        ]);
    }
}