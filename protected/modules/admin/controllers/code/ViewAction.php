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

namespace application\modules\admin\controllers\code;

use application\models\entities;
use application\models\defines\UserRole;

class ViewAction extends \CAction
{
    public function run()
    {
        $ids = \Yii::app()->request->getParam('code') ?: [];
        $criteria = new \CDbCriteria();
        $criteria->addInCondition('id', $ids);
        $entities = entities\Code::model()->findAll($criteria);
        
        $this->controller->render('view', [
            'entities' => $entities,
        ]);
    }
}
