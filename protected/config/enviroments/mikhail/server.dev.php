<?php
function dd($s) {print "<pre>";var_dump($s);print "</pre>";}

$data =  array(
    // application components
    'components'=>array(
        'db'=>array(
            'connectionString'  => 'mysql:host=localhost;dbname=motivator',
            'emulatePrepare'    => true,
            'username'          => 'root',
            'password'          => 'start123',
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
        'helpEmail'    =>'help@motivator-travel.by',
        'adminEmail'    =>'abonent@motivator-travel.by',
        'senderEmail' => 'igorshablovsky@gmail.com',
        'yiiPath'       => 'd:\www/motivator.by/framework/yii.php'
    ),
);

return $data;