<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       11.11.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\controllers\banner;

use application\models\BannerSite;
use application\modules\admin\models\forms;


class AddAction extends \CAction
{
    public function run()
    {
        $formEntity = new forms\BannerSite();

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

        $this->controller->render('add-manager', [
            'touragent' => $touragent,
            'form' => new \CForm('application.modules.admin.views.forms.touragent-manager', $formEntity)
        ]);
    }
}