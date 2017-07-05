<?php
/**
 * @author soza.mihail@gmail.com
 */
return array(
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=penkiby_main',
            'emulatePrepare' => true,
            'username' => 'penkiby_main',
            'password' => 'OrOrUPWr$21',
            'charset' => 'utf8',
        )
    ),
    'params' => array(
        'adminEmail'    =>'abonent@penki.by',
        'senderEmail' => 'igorshablovsky@gmail.com',
    )
);