<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\api;

use application\components\DbTransaction;
use application\models\defines\tourist\Helper;
use application\models\Logs;

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

            Logs::info("New tourist:",  $tourist->attributes, 'registration');

            $s = \Tool::sendEmailWithLayout($tourist, 'registration');
            
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