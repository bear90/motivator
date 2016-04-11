<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\api;

use application\components\DbTransaction;
use application\models\defines\tourist\Helper;

class TouristCreateAction extends \CApiAction
{
    public function doRun()
    {
        $attributes = \Yii::app()->request->getRawBody();
        $attributes = json_decode($attributes, true);
        $sended = 0;

        DbTransaction::begin();

        try {
            $helper = new Helper;
            $tourist = $helper->create($attributes);

            $s = \Tool::sendEmailWithView(
                $tourist->email,
                'registration', 
                [
                    'tourist' => $tourist
                ]
            );
            \Tool::sendMessage($tourist, 'after_registration', ['tourist' => $tourist], '+1 day');
            $sended = 1;

            DbTransaction::commit();

        } catch (Exception $e)
        {
            DbTransaction::rollBack();
            throw $e;
        }
        
        return [
            'id' => $tourist->id,
            'sended' => $sended
        ];
    }
}