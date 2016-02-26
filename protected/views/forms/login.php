<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('user/login'),
    'elements' => [

        'password' => [
            'label' => 'Введите пароль:',
            'type' => 'password',
            'layout' => '{label}{input}'
        ]
    ],

    'buttons' => [
        '<div class="submit-block">',
        'login' => [
            'type' => 'submit',
            'label' => 'Войти',
        ],
        '</div>'
    ],
];