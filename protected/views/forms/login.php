<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('/'),
    'elements' => [
        'submit' => [
            'type' => 'hidden',
            'value' => '1',
            'attributes' => [
                'name' => 'submit',
            ],
            'layout' => '{input}',
        ],
        'password' => [
            'label' => 'Введите пароль:',
            'type' => 'password',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'password',
            ]
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