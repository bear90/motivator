<?php


class AdminModule extends CWebModule {
    
    public $layout = 'main';
    
    public $controllerMap = [
        'touragent' => 'application\modules\admin\controllers\TouragentController',
        'dashboard' => 'application\modules\admin\controllers\DashboardController',
        'text' => 'application\modules\admin\controllers\TextController',
        'params' => 'application\modules\admin\controllers\ParamsController',
        'template' => 'application\modules\admin\controllers\TemplateController',
        'search' => 'application\modules\admin\controllers\SearchController',
        'touroperator' => 'application\modules\admin\controllers\TouroperatorController',
        'archive' => 'application\modules\admin\controllers\ArchiveController',
        'post' => 'application\modules\admin\controllers\PostController',
        'configuration' => 'application\modules\admin\controllers\ConfigurationController',
        'banner' => 'application\modules\admin\controllers\BannerController',
        'name' => 'application\modules\admin\controllers\NameController',
        'country' => 'application\modules\admin\controllers\CountryController',
        'tourtype' => 'application\modules\admin\controllers\TourTypeController',
        'security' => 'application\modules\admin\controllers\SecurityController',
    ];
}

?>
