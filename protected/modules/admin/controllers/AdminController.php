<?php

/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       10.06.2016
 *
 */

namespace application\modules\admin\controllers;

use application\models\defines\UserRole;

class AdminController extends \CController
{
    public $jsModule = '';

    protected $whiteListAction = array(
        'dashboard' => array(
            'login',
            'logout',
        ),
    );

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    private function redirectTo($url, $checkAjax = true)
    {
        if ($checkAjax && \Yii::app()->request->isAjaxRequest) {
            echo json_encode(
                array(
                    'redirect' => $this->createUrl($url)
                )
            );
        } else {
            $this->redirect($this->createUrl($url));
        }
    }

    private function isWhiteListedAction()
    {
        // Check for white list action
        $controllerId = \Yii::app()->controller->id;
        $actionId = \Yii::app()->controller->action->id;
        if (isset( $this->whiteListAction[ $controllerId ] )) {
            return in_array($actionId, $this->whiteListAction[ $controllerId ]);
        }
        // Not in white list if not found
        return false;
    }

    public function filterAccessControl($filterChain)
    {
        switch (true) {
            // Whitelistes URL
            case $this->isWhiteListedAction():
                $filterChain->run();
                break;

            // Not logged in user
            case \Yii::app()->user->isGuest:
            case \Yii::app()->user->model === null:
            case \Yii::app()->user->model->roleId != UserRole::ADMIN:
                $this->redirectTo('/admin/dashboard/login');
                break;

            // Continue
            default:
                $filterChain->run();
        }
    }

    public function getMenu(){
        $menu = array_map(function($item){
            if (isset($this->action->menuKey) && $this->action->menuKey == $item['key'] 
                || $item['key'] == $this->id && !isset($this->action->menuKey))
            {
                $item['active'] = true;
            }
            return $item;
        },[
            [
                'key' => 'touragent',
                'label' => 'Турагенты',
                'url' => '/admin/touragent',
            ],
            [
                'key' => 'balance',
                'label' => 'Баланс',
                'url' => '/admin/touragent/balance',
            ],
            [
                'key' => 'text',
                'label' => 'Текстовые блоки',
                'url' => '/admin/text',
            ],
            [
                'key' => 'params',
                'label' => 'Параметры',
                'url' => '/admin/params',
            ],
            [
                'key' => 'template',
                'label' => 'Шаблоны писем',
                'url' => '/admin/template',
            ],
            [
                'key' => 'search',
                'label' => 'Поиск туристов',
                'url' => '/admin/search',
            ],
            [
                'key' => 'touroperator',
                'label' => 'Туроператоры',
                'url' => '/admin/touroperator',
            ],
            [
                'key' => 'archive',
                'label' => 'Отчетность',
                'url' => '/admin/archive',
            ],
            [
                'key' => 'post',
                'label' => 'Рассылка',
                'url' => '/admin/post',
            ],
            [
                'key' => 'congifuration',
                'label' => 'Настройки',
                'url' => '/admin/configuration',
            ],
            [
                'key' => 'banner',
                'label' => 'Рекламный блок',
                'url' => '/admin/banner',
            ]
        ]);

        return $menu;
    }
}