<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\api;

use application\models\defines\tourist\Helper;

class TouristCreateAction extends \CApiAction
{
    public function doRun()
    {
        $attributes = \Yii::app()->request->getRestParams();

        $helper = new Helper;
        $tourist = $helper->create($attributes);

        $s = \Tool::sendEmailWithView(
            $tourist->email, 
            'Вы зарегистрированы на сайте МОТИВАТОР',
            'registration', 
            [
                'tourist' => $tourist
            ]
        );
        
        return [
            'id' => $tourist->id,
            'sended' => $s
        ];
    }
}