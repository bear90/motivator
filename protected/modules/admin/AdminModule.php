<?php


class AdminModule extends CWebModule {
    
    public $layout = 'main';
    
    public $controllerMap = [
        'touragent' => 'application\modules\admin\controllers\TouragentController',
    ];
}

?>
