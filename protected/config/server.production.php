<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 0);

return array(
    // application components
    'components'=>array(
        'db'=>array(
            'connectionString'  => 'mysql:host=localhost;dbname=alarm',
            'emulatePrepare'    => true,
            'username'          => 'root',
            'password'          => '5Hf!8edd',
            'charset'           => 'utf8',
        ),

        'twilio' => array(
            'class'         => 'ext.SoxesTwilio.SoxesTwilio',
            'account_sid'   => 'ACf0a71422fc4101136a3b7aeb38698ca6',
            'auth_token'    => '2536620b9a43d50030318353380de5f5',
            'numbers'       => array(
                'sms'   => '+41798071606',
                'voice' => '+41435083291'
            )
        ),
    ),

    'params'=>array(
        'adminEmail'    =>'vmishin@soxes.com',
        'yiiPath'       => '/var/frameworks/yii/framework/yii.php',
    ),
);
