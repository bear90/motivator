<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\modules\admin\controllers\touragent;

use application\models\entities\Touragent;
use application\models\entities;
use application\models\Entity;
use application\modules\admin\models\forms;

/*use application\models\User;
use application\models\TouragentParam;
use application\models\TouragentOperator;

use application\components\MCForm;*/

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

        $touragentFormEntity = new forms\TouragentForm('update');
        $touragentFormEntity->attributes = $touragent->attributes;

        if(\Yii::app()->request->isPostRequest)
        {
            \CHtml::setModelNameConverter(function(){
                return 'Touragent';
            });
            $touragentFormEntity->userId = $touragent->userId;
            $touragentFormEntity->attributes = \Yii::app()->request->getPost('Touragent');

            if($touragentFormEntity->validate())
            {
                // Save data
                $model = new Entity\Touragent($touragent);
                $attributes = $touragentFormEntity->attributes;
                $model->save($attributes);

                if ($touragentFormEntity->password)
                {
                    $userEntity = entities\User::model()->findByPk($touragent->userId);
                    $user = new Entity\User($userEntity);
                    $user->save(['password' => $touragentFormEntity->password]);

                    $touragentFormEntity->password = '';
                    $touragentFormEntity->password2 = '';
                }

                $success = 'Турагент успешно обновлен';
            }
        }

        $this->controller->render('edit', [
            'touragent' => $touragent,
            'success' => $success,
            'touragentForm' => new \CForm('application.modules.admin.views.forms.touragent-form', $touragentFormEntity),
        ]);
    }

    public function listAction()
    {
        $touragents = Touragent::model()->findAll();
        $filterFormEntity = new forms\TouragentFilterForm();

        $this->controller->render('index', [
            'touragents' => $touragents,
            'message' => \Yii::app()->user->getFlash('message', ''),
            'filterForm' => new \CForm('application.modules.admin.views.forms.touragent-filter-form', $filterFormEntity)
        ]);
    }
}