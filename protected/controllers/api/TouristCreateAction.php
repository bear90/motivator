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
        $attributes = \Yii::app()->request->getRawBody();
        $attributes = json_decode($attributes, true);

        $helper = new Helper;
        $tourist = $helper->create($attributes);

        $s = \Tool::sendEmailWithView(
            $tourist->email,
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