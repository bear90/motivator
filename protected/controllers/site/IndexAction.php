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
        $loginForm = new forms\UserLoginForm;
        $filterForm = new forms\TaskFilterForm();
        $taskForm = new forms\TaskForm();
        $offerForm = new forms\OfferForm();
        $feedbackForm = new forms\FeedbackForm();

        if (\Yii::app()->request->isPostRequest)
        {
            $password = \Yii::app()->request->getPost('password');
            $loginForm->password = $password;

            if ($loginForm->validate() && $loginForm->login(UserRole::USER)) {
                $this->controller->redirect(\Yii::app()->createUrl('/#block-main-table'));
                return;
            } else {
                \Yii::app()->user->setFlash('loginMessage', 'Неверный пароль');
            }
        }

        $criteria = $this->getCriteria($filterForm);
        $criteria->with['offers'] = ['order' => 'offers.type, offers.sort DESC'];
        $entities = Entity\Task\Repository::getAll($criteria);

        $this->controller->render('index', [
            'taskForm' => new \CForm('application.views.forms.task-form', $taskForm),
            'offerForm' => new \CForm('application.views.forms.offer-form', $offerForm),
            'filterForm' => new \CForm('application.views.forms.task-filter-form', $filterForm),
            'loginForm' => new \CForm('application.views.forms.user-login-form', $loginForm),
            'feedbackForm' => new \CForm('application.views.forms.feedback-form', $feedbackForm),
            'loginMessage' => \Yii::app()->user->getFlash('loginMessage', null),
            'actionMessage' => \Yii::app()->user->getFlash('actionMessage', null),
            'entities' => $entities,
            'offerForTask' => \Yii::app()->user->getFlash('offerForTask', null),
            'createdTaskId' => \Yii::app()->user->getFlash('createdTaskId', null),
            'touragentNames' => Entity\Touragent\Repository::getTouragentNames()
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

        // Filter by User
        if (\Yii::app()->user->isUser()) {
            $userId = \Yii::app()->user->model->id;
            $criteria->addCondition('t.userId = :userId');
            $criteria->params['userId'] = $userId;
        }

        $criteria->order = 'createdAt DESC';

        return $criteria;
    }
}
