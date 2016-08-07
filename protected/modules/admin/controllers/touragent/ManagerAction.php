<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\Touragent;
use application\models\TouragentManager;

class ManagerAction extends \CAction
{

    public function run($id = null)
    {
        $touragent = Touragent::model()->findByPk($id);
        $entities = TouragentManager::model()->findAllByAttributes([
            'touragentId' => $id
        ]);
        
        $this->controller->render('managers', [
            'touragent' => $touragent,
            'entities' => $entities,
            'message' => \Yii::app()->user->getFlash('message', '')
        ]);
    }

}