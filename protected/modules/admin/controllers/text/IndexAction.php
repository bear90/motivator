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

namespace application\modules\admin\controllers\text;


use application\modules\admin\models\Entity\TextEntity;

class IndexAction extends \CAction
{
    public function run($id = null)
    {
        $pages = TextEntity::model()->findAll();
        $message = '';

        if (\Yii::app()->user->hasState('message'))
        {
            $message = \Yii::app()->user->getState('message');
            \Yii::app()->user->setState('message', null);
        }
        
        $this->controller->render('index', [
            'pages' => $pages,
            'message' => $message
        ]);
    }
}