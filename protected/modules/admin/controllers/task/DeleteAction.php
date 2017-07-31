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

class DeleteAction extends \CAction
{
    public function run($id = null)
    {
        if ($id) {
            $entity = entities\Task::model()->findByPk($id);
            if($entity) {
                \Tool::sendEmailWithLayout($entity, 'admin-deletion');
                
                $entity->delete();
            }

            \Yii::app()->user->setFlash('message', "Запись удалена успешно.");
        }
        
        $this->controller->redirect(\Yii::app()->createUrl('/admin/task'));
        return;
    }
}
