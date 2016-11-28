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

class DeleteAction extends \CAction
{
    public function run()
    {
        $id = (int) \Yii::app()->request->getParam('id');
        BannerSite::model()->deleteByPk($id);
        
        \Yii::app()->user->setFlash('message', "Рекламный блок удален успешно.");
        $this->controller->redirect(\Yii::app()->createUrl("/admin/banner"));
    }
}