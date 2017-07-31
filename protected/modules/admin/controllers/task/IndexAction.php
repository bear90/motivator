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

namespace application\modules\admin\controllers\task;

use application\models\entities;

class IndexAction extends \CAction
{
    public function run($id = null)
    {
        $criteria = new \CDbCriteria();
        $criteria->order = 'createdAt DESC';
        $entities = entities\Task::model()->findAll($criteria);
        
        $this->controller->render('index', [
            'entities' => $entities,
            'message' => \Yii::app()->user->getFlash('message', ''),
            'error' => \Yii::app()->user->getFlash('error', ''),
        ]);
    }
}
