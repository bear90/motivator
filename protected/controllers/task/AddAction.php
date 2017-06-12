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

        $attributes['name'] = !empty($attributes['name1']) ? $attributes['name1'] : $attributes['name2'];
        
        $task = new Entity\Task();
        $task->save($attributes);
        $task->attachCountries($attributes['country']);
        $task->attachCildAgies($attributes['childAge']);

        $this->controller->redirect('/');
    }
}
