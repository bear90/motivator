<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\task;
use application\models\Entity;
use application\models\forms;
use application\models\Tools;

class AddAction extends \CAction
{
    public function run()
    {
        $attributes = \Yii::app()->request->getPost('task');
        $veryfyCode = \Yii::app()->request->getPost('veryfyCode');

        $startedAt = new \DateTime($attributes['startedAt']);
        $attributes['startedAt'] = $startedAt->format("Y-m-d H:i:s");
        $attributes['name'] = !empty($attributes['name1']) ? $attributes['name1'] : $attributes['name2'];
        
        $task = new Entity\Task();
        $task->save($attributes);
        $task->attachCountries($attributes['country']);
        if ($task->data()->childCount) {
            $task->attachCildAgies($attributes['childAge']);
        }

        \Yii::app()->user->setFlash('createdTaskId', $task->data()->id);
        
        $this->controller->redirect('/#task_' . $task->data()->id);
        
        \Tool::sendEmailWithView($task->data()->email, 'add-task');
    }
}
