<?php
error_reporting(E_ALL ^ E_NOTICE);
//ini_set("display_errors", 0);

return array(
    // application components
    'components'=>array(
        'db'=>array(
            'connectionString'  => 'mysql:host=localhost;dbname=user2034796_penkiby',
            'emulatePrepare'    => true,
            'username'          => 'penkiby',
            'password'          => 'gUjWR986',
            'charset'           => 'utf8',
        ),
    ),

    'params'=>array(
        'helpEmail'    =>'help@penki.by',
        'adminEmail'    =>'abonent@penki.by',
        'senderEmail' => 'webmaster@penki.by',
        'yiiPath'       => '/home/user2007762/frameworks/1.1.17/framework/yii.php',
    ),
);
