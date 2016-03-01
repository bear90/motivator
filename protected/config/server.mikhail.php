<?php
function dd($s) {print "<pre>";var_dump($s);print "</pre>";}

$data =  array(
    // application components
    'components'=>array(
        'db'=>array(
            'connectionString'  => 'mysql:host=localhost;dbname=motivator',
            'emulatePrepare'    => true,
            'username'          => 'root',
            'password'          => 'root',
            'charset'           => 'utf8',
            'enableParamLogging' => true,
            // 'initSQLs'          => array("SET collation_connection  = 'utf8_unicode_ci'")
        ),
        'mail' => array(
            'class' => 'application.extensions.yii-mail.YiiMail',
            'dryRun' => true
        ),
    ),

    'params'=>array(
        'adminEmail'    =>'webmaster@example.com',
        'yiiPath'       => 'd:\etc/frameworks/yii-1.1.16.bca042/framework/yii.php'
    ),
);

return $data;