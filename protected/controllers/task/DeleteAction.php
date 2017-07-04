<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\task;
use application\models\Entity;
use application\models\entities;
use application\models\defines;

class DeleteAction extends \CAction
{
    public function run($id)
    {
        // 1. Check user
        if (!\Yii::app()->user->isUser()) {
            $this->controller->redirect('/');
            return;
        }

        // 2. Find task
        $userId = \Yii::app()->user->model->id;
        $task = entities\Task::model()->findByAttributes([
            'id' => $id,
            'userId' => $userId
        ]);

        if ($task) {
            // 3. Logout user
            \Yii::app()->user->identityCookie = [];
            \Yii::app()->user->logout();

            // 4. Remove task
            $task->delete();

            $this->controller->redirect('/#all-tasks');
        }
        $this->controller->redirect('/');
    }
}
