<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\site;

use application\models\Entity;
use application\models\forms;
use application\models\forms\UserLogin;
use application\models\defines\UserRole;


class IndexAction extends \CAction
{
    public function run()
    {
        $userModel = \Yii::app()->user->getModel();
        //$loginForm = new UserLogin;
        $filterForm = new forms\TaskFilterForm();
        $taskForm = new forms\TaskForm();

        /*$loginError = null;
        if (\Yii::app()->request->isPostRequest)
        {
            $password = \Yii::app()->request->getPost('password');
            $loginForm->password = $password;

            if ($loginForm->validate() && $loginForm->login(UserRole::USER)) {
                $this->controller->redirect(\Yii::app()->createUrl('user/dashboard'));
                return;
            } else {
                $loginError = 'Не верный логин или пароль';
            }
        }*/

        $criteria = $this->getCriteria($filterForm);
        $entities = Entity\Task\Repository::getAll($criteria);

        $this->controller->render('index', [
            'taskForm' => new \CForm('application.views.forms.task-form', $taskForm),
            'filterForm' => new \CForm('application.views.forms.task-filter-form', $filterForm),
            //'loginError' => $loginError,
            'entities' => $entities
        ]);
    }

    private function getCriteria(forms\TaskFilterForm $filterForm)
    {
        $criteria = new \CDbCriteria();
        $criteria->with['countries'] = ['select' => false];
        // Filter by country
        $filterForm->country = \Yii::app()->request->getParam('country');
        if (!empty($filterForm->country)) {
            $criteria->addCondition('countries.id = :country');
            $criteria->params['country'] = $filterForm->country;
        }
        // Filter by date
        $filterForm->startedAtFrom = \Yii::app()->request->getParam('startedAtFrom');
        $filterForm->startedAtTo = \Yii::app()->request->getParam('startedAtTo');
        if (!empty($filterForm->startedAtFrom)) {
            $date = new \DateTime($filterForm->startedAtFrom);
            $criteria->addCondition('t.startedAt >= :startedAtFrom');
            $criteria->params['startedAtFrom'] = $date->format("Y-m-d H:i:s");
        }
        if (!empty($filterForm->startedAtTo)) {
            $date = new \DateTime($filterForm->startedAtTo);
            $criteria->addCondition('t.startedAt <= :startedAtTo');
            $criteria->params['startedAtTo'] = $date->format("Y-m-d H:i:s");
        }
        // Filter by adults
        $filterForm->adultCount = \Yii::app()->request->getParam('adults');
        if (!empty($filterForm->adultCount)) {
            $criteria->addCondition('t.adultCount = :adults');
            $criteria->params['adults'] = $filterForm->adultCount;
        }
        $criteria->order = 'createdAt DESC';

        return $criteria;
    }
}
