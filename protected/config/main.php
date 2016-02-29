<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Motivator web application',
    'language' => 'en',

    'import' => array(
        //'application.models.*',
        //'application.models.entities.*',
        //'application.models.Defines.*',
        'application.components.*',
    ),
    'controllerMap' => array(
        'site' => '\application\controllers\SiteController',
        'api' => '\application\controllers\ApiController',
        'debug' => '\application\controllers\DebugController',
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
                // REST patterns
                ['api/touristCreate', 'pattern'=>'api/tourist', 'verb'=>'POST'],
                // Others
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
        'mail' => array(
            'class' => 'application.extensions.yii-mail.YiiMail',
            /*'transportType' => 'smtp',
            'transportOptions' => array(
                'host' => 'webmail.active.by',
                'username' => 'user@Мотиватор.бел',
                'password' => 'zaq1$RFV',
                'port' => '465',
                'encryption'=>'tls',
            ),
            'logging' => true,
            'dryRun' => false*/
        ),

        'log' => array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'trace, info, error, warning',
                    //'categories'=>'system.*',
                ),
                /*array(
                    'class'=>'CEmailLogRoute',
                    'levels'=>'error, warning',
                    'emails'=>'admin@example.com',
                ),*/
            ),
        ),
        'fixture'=>array(
            'class'=>'system.test.CDbFixtureManager',
        )
    ),

    'params' => [
        'adminEmail' => 'webmaster@example.com',
    ],
);
