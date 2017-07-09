<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\task;
use application\models\Entity;
use application\models\forms;
use application\models\defines;

class AddAction extends \CAction
{
    public function run()
    {
        $attributes = \Yii::app()->request->getPost('task');
        $veryfyCode = \Yii::app()->request->getPost('veryfyCode');

        // 1. Crate a user
        $password = Entity\User::generatePassword();
        $model = new Entity\User();
        $model->create($password, defines\UserRole::USER);
        $attributes['userId'] = $model->data()->id;

        $startedAt = new \DateTime($attributes['startedAt']);
        $attributes['startedAt'] = $startedAt->format("Y-m-d H:i:s");
        $attributes['name'] = !empty($attributes['name1']) ? $attributes['name1'] : $attributes['name2'];
        //var_dump($attributes);die;
        
        $task = new Entity\Task();
        $task->save($attributes);
        $task->attachCountries($attributes['country']);
        if ($task->data()->childCount) {
            $task->attachCildAgies($attributes['childAge']);
        }

        \Yii::app()->user->setFlash('createdTaskId', $task->data()->id);
        
        \Tool::sendEmailWithLayout($task->data(), 'add-task');
        
        $this->controller->redirect('/#all-tasks');
    }
}
