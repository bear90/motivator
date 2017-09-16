<?php
error_reporting(E_ALL ^ E_NOTICE);
//ini_set("display_errors", 0);

return array(
    // application components
    'components'=>array(
        'db'=>array(
            'connectionString'  => 'mysql:host=localhost;dbname=motivator',
            'emulatePrepare'    => true,
            'username'          => 'root',
            'password'          => 'start123',
            'charset'           => 'utf8',
        ),
        'mail' => array(
            'class' => 'application.extensions.yii-mail.YiiMail',
            'viewPath' => 'application.views.templates',
            /*'transportType' => 'smtp',
            'transportOptions' => array(
                'host' => 'mail.motivator-travel.by',
                'username' => 'help@motivator-travel.by',
                'password' => 'Testtest1@',
                'port' => '25',
                'encryption'=>'tls',
            ),
            'logging' => true,*/
            'dryRun' => true
        ),
    ),

    'params'=>array(
        'helpEmail'    =>'help@penki.by',
        'adminEmail'    =>'abonent@penki.by',
        'senderEmail' => 'webmaster@penki.by',
    ),
);
