<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\Tourist;
use application\models\Touragent;
use application\models\defines\TouristStatus;

class ClearAction extends \CAction
{

    public function run($id = null)
    {
        if ($id == null) 
        {
            $num = $this->clearTouristsWithoutTouragents();
            \Yii::app()->db->createCommand()->truncateTable('tourists');

            \Yii::app()->user->setState('message', "Туристы удалены: {$num}");
        } 
        else 
        {
            $touragent = Touragent::model()->findByPk($id, ['with' => 'tourists2']);
            if ($touragent) {
                
                $num = $this->clearTouristsByTouragent($touragent);

                \Yii::app()->user->setState('message', "Туристы турагента {$touragent->name} удалены: {$num}");
            }
        }

        $this->controller->redirect('/admin/touragent');
    }

    private function clearTouristsByTouragent(Touragent $touragent)
    {
        $i = 0;
        foreach ($touragent->tourists2 as $tourist) {
            $command = \Yii::app()->db->createCommand();
            $tourist->delete();
            $command->delete('users', 'id=:id', array('id'=>$tourist->userId));
            $i++;
        }
        $touragent->account = 0;
        $touragent->save();

        return $i;
    }

    private function clearTouristsWithoutTouragents()
    {
        $tourists = Tourist::model()->findAllByAttributes([
            'statusId' => TouristStatus::WANT_DISCONT
        ]);

        $i = 0;
        foreach ($tourists as $tourist) {
            $command = \Yii::app()->db->createCommand();
            $tourist->delete();
            $command->delete('users', 'id=:id', array('id'=>$tourist->userId));
            $i++;
        }

        return $i;
    }
}