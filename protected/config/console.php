<?php
/**
 * @author soza.mihail@gmail.com
 */
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name' => 'Motivator web application',
    'language' => 'en',
    'import' => array(
        //'application.models.*',
        //'application.models.entities.*',
        //'application.models.Defines.*',
        'application.components.*',
    ),
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=motivator',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'start123',
            'charset' => 'utf8',
        ),
        'mail' => array(
            'class' => 'application.extensions.yii-mail.YiiMail',
            'viewPath' => 'application.views.templates',
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
    )
);