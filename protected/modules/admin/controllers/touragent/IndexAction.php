<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\Touragent;
use application\models\User;
use application\models\TouragentParam;
use application\models\TouragentOperator;
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
        $touragent = Touragent::model()->with(['touroperatorLinks'])->findByPk($id);
        $success = '';

        $touragentFormEntity = new forms\Touragent();
        $touragentFormEntity->attributes = $touragent->attributes;

        if(\Yii::app()->request->isPostRequest)
        {
            $year = \Yii::app()->request->getPost('year');

            if (isset($year))
            {
                $fieldName = 'application_modules_admin_models_forms_TouragentParam';
                $touragentParams = (array) \Yii::app()->request->getPost($fieldName);
                $year = (int) \Yii::app()->request->getPost('year');

                $valid=true;
                foreach($touragentParams as $i=>$item)
                {
                    $touragentParamFormEntity = new forms\TouragentParam();
                    $touragentParamFormEntity->attributes = $item;

                    if($touragentParamFormEntity->validate())
                    {
                        $entity = TouragentParam::model()->findByAttributes([
                            'week' => $i+1,
                            'year' => $year,
                            'touragentId' => $id,
                        ]);

                        if (is_null($entity))
                        {
                            $entity = new TouragentParam;
                            $entity->week = $i + 1;
                            $entity->year = $year;
                            $entity->touragentId = $id;
                        }

                        $entity->attributes = $touragentParamFormEntity->attributes;
                        $entity->save();
                    }
                }

                $success = $valid ?
                        'Параметры успешно обновлены' : '';
            }
            else 
            {
                \CHtml::setModelNameConverter(function(){
                    return 'Touragent';
                });
                $touragentFormEntity->userId = $touragent->userId;
                $touragentFormEntity->attributes = \Yii::app()->request->getPost('Touragent');
                $touragentFormEntity->logo = \CUploadedFile::getInstance($touragentFormEntity,'logo');

                if($touragentFormEntity->validate())
                {
                    // Save file
                    if ($touragentFormEntity->logo)
                    {
                        $storage = $touragent->getStorage();
                        
                        if ($touragent->logo)
                        {
                            unlink($storage . '/' . $touragent->logo);
                        }

                        
                        if (!is_dir($storage))
                        {
                            mkdir($storage, 0777, true);
                        }

                        $path = $storage.'/logo.'.$touragentFormEntity->logo->getExtensionName();
                        if ($touragentFormEntity->logo->saveAs($path))
                        {
                            $touragent->logo = 'logo.'.$touragentFormEntity->logo->getExtensionName();
                        }
                    }
                    if (\Yii::app()->request->getPost('deleteLogo'))
                    {
                        if ($touragent->logo){
                            unlink($touragent->getStorage() . '/' . $touragent->logo);
                        }
                        $touragent->logo = null;
                    }
                    // Save data
                    $touragent->attributes = $touragentFormEntity->attributes;
                    $touragent->save();

                    if ($touragentFormEntity->password)
                    {
                        $userEntity = User::model()->findByPk($touragent->userId);
                        $userEntity->password = $touragentFormEntity->password;
                        $userEntity->save();

                        $touragentFormEntity->password = '';
                        $touragentFormEntity->repeate = '';
                    }

                    // Save Touroperators
                    $oldOperators = array_map(function($item){
                        return $item->touroperatorId;
                    }, $touragent->touroperatorLinks);
                    $touroperators = (array) \Yii::app()->request->getPost('Touroperator');

                    $_add = array_diff($touroperators, $oldOperators);
                    $_remove = array_diff($oldOperators, $touroperators);

                    foreach ($_add as $touroperatorId) {
                        $entity = new TouragentOperator;
                        $entity->touragentId = $touragent->id;
                        $entity->touroperatorId = $touroperatorId;
                        $entity->save();
                    }
                    foreach ($_remove as $touroperatorId) {
                        $command = \Yii::app()->db->createCommand();
                        $command->delete('touragent_operator',
                            'touragentId = :touragentId AND touroperatorId = :touroperatorId', 
                            [
                                'touragentId' => $touragent->id,
                                'touroperatorId' => $touroperatorId,
                            ]);
                    }
                    $touragent->refresh();

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
        $cmd->select(['sourceTouragentId', 'targetTouragentId', 'amount'])
            ->from('discount_transaction')
            ->where('sourceTouragentId != targetTouragentId');

        $balance = [];
        foreach ($cmd->queryAll() as $row) {
            $a = intval($row['sourceTouragentId']);
            $b = intval($row['targetTouragentId']);
            $balance[] = [
                'type' => "{$a}-{$b}",
                'amount' => intval($row['amount']),
            ];
        }/*

        $balance = [];
        foreach ($touragents as $a) {
            foreach ($touragents as $b) {
                $balance[$a->id][$b->id] = [];
                if (isset($data["{$a->id}->{$b->id}"]))
                {
                    $balance[$a->id][$b->id][] = $data["{$a->id}->{$b->id}"];
                }
                if (isset($data["{$b->id}->{$a->id}"]))
                {
                    $balance[$a->id][$b->id][] = $data["{$b->id}->{$a->id}"];
                }
            }
        }*/

        return $balance;
    }
}