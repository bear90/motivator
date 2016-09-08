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

namespace application\modules\admin\controllers\touragent;


use application\modules\admin\models\TouragentManager;
use application\models\TouragentManager as TouragentManagerEntity;

class ResetBonusAction extends \CAction
{
    public function run($id)
    {
        $entity = TouragentManagerEntity::model()->findByPk($id);

        $touragentId = $entity->touragentId;

        $entity->bonus = 0;
        $entity->save();

        \Yii::app()->user->setFlash('message', "Бонус обнулен успешно.");
        $this->controller->redirect(\Yii::app()->createUrl("/admin/touragent/manager/{$touragentId}"));
        return;
    }
}