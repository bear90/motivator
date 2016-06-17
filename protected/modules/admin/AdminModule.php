<?php


class AdminModule extends CWebModule {
    
    public $layout = 'main';
    
    public $controllerMap = [
        'touragent' => 'application\modules\admin\controllers\TouragentController',
        'dashboard' => 'application\modules\admin\controllers\DashboardController',
        'text' => 'application\modules\admin\controllers\TextController',
    ];
}

?>
