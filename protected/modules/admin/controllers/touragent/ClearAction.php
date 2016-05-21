<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\Touragent;

class ClearAction extends \CAction
{

    public function run($id = null)
    {
        $touragent = Touragent::model()->findByPk($id, ['with' => 'tourists2']);
        if ($touragent) {
            $i = 0;
            foreach ($touragent->tourists2 as $tourist) {
                $command = \Yii::app()->db->createCommand();
                $tourist->delete();
                $command->delete('users', 'id=:id', array('id'=>$tourist->userId));
                $i++;
            }
            $touragent->account = 0;
            $touragent->save();

            \Yii::app()->user->setState('message', "Туристы турагента {$touragent->name} удалены: {$i}");
            
            $this->controller->redirect('/admin/touragent');
        }
    }
}