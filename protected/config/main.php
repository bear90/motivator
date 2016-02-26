<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Motivator web application',
    'language' => 'ru',

    'import' => array(
        //'application.models.*',
        //'application.models.entities.*',
        //'application.models.Defines.*',
        //'application.components.*',
    ),
    'controllerMap' => array(
        'site' => '\application\controllers\SiteController',
    ),
    /*'modules' => array(
        'api' => array(
            'login'     => 'api',
            'password'  => 'zaq1@WSX',
        ),
        'cms' => array(),
        'twilio' => array(
            'login'     => 'test',
            'password'  => 'test',
        ),
        'eth' => array(),
        'myfox' => array(),
        'debug' => array()
    ),
    'behaviors'=> array(
        array('class'=>'application.components.ModuleUrlRulesBehavior')
    ),*/

    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'class' => 'WebUser',
            'allowAutoLogin' => true
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName'=>false,
            'rules' => array(
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=motivator',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'start123',
            'charset' => 'utf8',
        ),

        /*'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
        'fixture'=>array(
            'class'=>'system.test.CDbFixtureManager',
        )*/
    ),

    'params' => array(

        'adminEmail' => 'webmaster@example.com',
    ),
);
