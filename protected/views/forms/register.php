<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('user/register'),
    'attributes' => [
        'class' => 'motivator-form bv-form',
    ],
    'elements' => [
        'last_name' => [
            'label' => 'Фамилия:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'last_name',
                'placeholder' => 'Фамилия'
            ]
        ],
        'first_name' => [
            'label' => 'Имя:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'first_name',
                'placeholder' => 'Имя'
            ]
        ],
        'email' => [
            'label' => 'E-mail:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'email',
                'placeholder' => 'e-mail'
            ]

        ],
        'verifyCode' => [
            'type' => 'text',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'verifyCode'
            ]

        ],
        'groupCode' => [
            'type' => 'text',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'groupCode',
                'placeholder' => 'Код'
            ]

        ],
    ]
];