<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\feedback;

use application\models\entities;

class IndexAction extends \CAction
{

    public function run($id = null)
    {
        $entities = entities\Feedback::model()->findAll();

        $this->controller->render('index', [
            'entities' => $entities,
            'message' => \Yii::app()->user->getFlash('message', ''),
        ]);
    }
}