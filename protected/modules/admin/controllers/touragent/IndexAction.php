<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\Touragent;
use application\models\TouragentParam;
use application\modules\admin\models\forms;
use application\components\MCForm;

class IndexAction extends \CAction
{

    public function run($id = null)
    {
        if ($id) {
            $this->editAction($id);
        } else {
            $this->listAction();
        }
    }

    public function editAction($id)
    {
        $touragent = Touragent::model()->findByPk($id);
        $success = '';

        $touragentFormEntity = new forms\Touragent();
        $touragentFormEntity->attributes = $touragent->attributes;

        if(\Yii::app()->request->isPostRequest)
        {
            $year = \Yii::app()->request->getPost('year');

            if (isset($year))
            {
                $fieldName = 'application_modules_admin_models_forms_TouragentParam';
                $touragentParams = \Yii::app()->request->getPost($fieldName);

                $valid=true;
                foreach($touragentParams as $i=>$item)
                {
                    $touragentParamFormEntity = new forms\TouragentParam();
                    $touragentParamFormEntity->attributes = $item;
                    // @Todo: FUCKING SCRUTCH!!!
                    if($touragentParamFormEntity->validate())
                    {
                        $entity = TouragentParam::model()->find([
                            'condition' => 'week(date, 3) = :week AND touragentId = :id',
                            'params' => ['week' => $i, 'id' => $id]
                        ]);

                        if (is_null($entity))
                        {
                            $entity = new TouragentParam;
                            $week = $i + 1;
                            $timeFormat = "{$year}W" . ($week < 10 ? "0{$week}" : $week);
                            $entity->date = date('Y-m-d 00:00:00', strtotime($timeFormat));
                            $entity->touragentId = $id;
                        }
                    }

                    $entity->attributes = $touragentParamFormEntity->attributes;
                    $entity->save();
                }

                $success = $valid ?
                        'Параметры успешно обновлены' : '';
            }
            else 
            {
                $touragentFormEntity->attributes = \Yii::app()->request->getPost('Touragent');
                if($touragentFormEntity->validate())
                {
                    $touragent->attributes = $touragentFormEntity->attributes;
                    $touragent->save();

                    $success = !$touragent->hasErrors() ?
                        'Тураген успешно обновлен' : '';
                }
            }
            
        }
        

        $this->controller->render('edit', [
            'touragent' => $touragent,
            'success' => $success,
            'touragentForm' => new \CForm('application.modules.admin.views.forms.touragent', $touragentFormEntity)
        ]);
    }

    public function listAction()
    {
        $touragents = Touragent::model()->findAll(['with' => ['tourists2']]);
        $message = '';

        if (\Yii::app()->user->hasState('message'))
        {
            $message = \Yii::app()->user->getState('message');
            \Yii::app()->user->setState('message', null);
        }

        $this->controller->render('index', [
            'touragents' => $touragents,
            'message' => $message,
            'balance' => $this->getBalance($touragents)
        ]);
    }

    private function getBalance(array $touragents)
    {
        $cmd = \Yii::app()->db->createCommand();
        $cmd->select(['sourceTouragentId', 'targetTouragentId', 'SUM( amount ) AS amount'])
            ->from('discount_transaction')
            ->where('sourceTouragentId != targetTouragentId')
            ->group('sourceTouragentId, targetTouragentId');

        $data = [];
        foreach ($cmd->queryAll() as $row) {
            $a = intval($row['sourceTouragentId']);
            $b = intval($row['targetTouragentId']);
            $data["{$a}->{$b}"] = intval($row['amount']);
        }

        $balance = [];
        foreach ($touragents as $a) {
            foreach ($touragents as $b) {
                $balance[$a->id][$b->id] = 0;
                if (isset($data["{$a->id}->{$b->id}"]))
                {
                    $balance[$a->id][$b->id] += $data["{$a->id}->{$b->id}"];
                }
                if (isset($data["{$b->id}->{$a->id}"]))
                {
                    $balance[$a->id][$b->id] -= $data["{$b->id}->{$a->id}"];
                }
            }
        }

        return $balance;
    }
}