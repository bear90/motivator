<?php
error_reporting(E_ALL ^ E_NOTICE);
//ini_set("display_errors", 0);

return array(
    // application components
    'components'=>array(
        'db'=>array(
            'connectionString'  => 'mysql:host=localhost;dbname=user2034796_penkiby_dev',
            'emulatePrepare'    => true,
            'username'          => 'penkiby_dev',
            'password'          => 'QRGqLtOd',
            'charset'           => 'utf8',
        ),
    ),

    'params'=>array(
        'helpEmail'    =>'help@motivator-travel.by',
        'adminEmail'    =>'abonent@motivator-travel.by',
        'senderEmail' => 'igorshablovsky@gmail.com',
        'yiiPath'       => '/home/user2007762/frameworks/1.1.17/framework/yii.php',
    ),
);
