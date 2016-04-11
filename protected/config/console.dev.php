<?php
/**
 * @author soza.mihail@gmail.com
 */
return array(
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=motivator',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'start123',
            'charset' => 'utf8',
        ),
        'mail' => array(
            'dryRun' => true
        ),
    ),
    'params' => array(
        'yiiPath'       => 'd:\www/motivator.by/framework/yii.php',
        'yiicPath'       => 'd:\www/motivator.by/framework/yiic.php'
    )
);