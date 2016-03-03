<?php
error_reporting(E_ALL ^ E_NOTICE);
//ini_set("display_errors", 0);

return array(
    // application components
    'components'=>array(
        'db'=>array(
            'connectionString'  => 'mysql:host=localhost;dbname=user2007762_motivator',
            'emulatePrepare'    => true,
            'username'          => 'motivator',
            'password'          => 'OrOrUPWr',
            'charset'           => 'utf8',
        ),
    ),

    'params'=>array(
        'adminEmail'    =>'soza.mihail@gmail.com',
        'yiiPath'       => '/home/user2007762/frameworks/1.1.17/framework/yii.php',
    ),
);
