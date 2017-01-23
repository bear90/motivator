<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       10.01.2017
 * @package
 * @copyright   Copyright (c) 2015-2017 soXes GmBh.
 *
 */

namespace application\modules\admin\controllers\banner;


use application\models\BannerSite;
use application\modules\admin\models\forms\Banner;

class UploadAction extends \CAction
{
    public function run($id)
    {
        $site = BannerSite::model()->findByPk($id);
        $formEntity = new Banner();
        $formEntity->banner = \CUploadedFile::getInstance($formEntity, 'banner');
        $formEntity->width = $site->width;
        $formEntity->height = $site->height;

        if($formEntity->validate()) {
            // Upload banner

            \Yii::app()->user->setFlash('message', "Изображение добавлено успешно.");
        } else {
            \Yii::app()->user->setFlash('error', implode(',', $formEntity->getErrors('banner')));
        }


        $this->controller->redirect(\Yii::app()->createUrl("/admin/banner"));
    }
}
