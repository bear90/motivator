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

namespace application\modules\admin\controllers\touroperator;


use application\models\Touroperator;

class IndexAction extends \CAction
{
    public function run($id = null)
    {
        $entities = Touroperator::model()->findAll();
        
        $this->controller->render('index', [
            'entities' => $entities,
            'message' => \Yii::app()->user->getFlash('message', '')
        ]);
    }
}