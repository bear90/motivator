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
            'password'          => 'root',
            'charset'           => 'utf8',
        ),
    ),

    /*'params'=>array(
        'helpEmail'    =>'help@motivator-travel.by',
        'adminEmail'    =>'abonent@motivator-travel.by',
        'senderEmail' => 'igorshablovsky@gmail.com',
        'yiiPath'       => '/home/michael/www/penki.by/vendor/yiisoft/yii/framework/yii.php',
    ),*/
);
