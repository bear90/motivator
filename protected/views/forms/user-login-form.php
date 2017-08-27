<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('/#login-user'),
    'elements' => [
        'password' => [
            'label' => 'Введите пароль:',
            'type' => 'password',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'password',
                'class' => 'form-control'
            ]
        ],
    ],
];