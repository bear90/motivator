<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\params;

use application\models\entities\Configuration;

class IndexAction extends \CAction
{

    public function run()
    {

        if (\Yii::app()->request->isPostRequest)
        {
            $params = (array) \Yii::app()->request->getPost('config');

            foreach ($params as $name => $value) 
            {
                $entity = Configuration::model()->findByAttributes(['name' => $name]);
                if($entity === null){
                    $entity = new Configuration;
                    $entity->name = $name;
                    $entity->type = 'string';
                }
                $entity->value = $value;
                $entity->save();
            }

            \Yii::app()->user->setFlash('message', "Параметры успешно обновлены.");
            $this->controller->redirect(\Yii::app()->createUrl('/admin/params'));
            return;
        }

        $this->controller->render('index', [
            'message' => \Yii::app()->user->getFlash('message', '')
        ]);
    }
}