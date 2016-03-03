<?php
/**
 * @author soza.mihail@gmail.com
 */
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name' => 'Motivator web application',
    'language' => 'en',
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=motivator',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'start123',
            'charset' => 'utf8',
        ),
    )
);