<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\task;
use application\models\Entity;
use application\models\entities;
use application\models\defines;
use application\models\entities\Configuration;

class ProlongAction extends \CAction
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
            $date = new \DateTime($task->createdAt);
            $days = intval(Configuration::get(Configuration::TASK_PROLONG_TERM));
            $date->modify("+{$days} days");

            $task->createdAt = $date->format('Y-m-d H:i:s');
            $task->save();

            $message = 'Размещение заявки продлено до ' . $date->format('d.m.Y');
            \Yii::app()->user->setFlash('actionMessage', $message);
        }
        $this->controller->redirect('/#block-main-table');
    }
}
