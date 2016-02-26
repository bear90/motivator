<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('user/register'),
    'attributes' => [
        'class' => 'motivator-form bv-form',
        'data-bv-message' => 'This value is not valid',
        'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok',
        'bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove',
        'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh',
    ],
    'elements' => [
        'last_name' => [
            'label' => 'Фамилия:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'email',
                'data-bv-notempty' => '',
                'data-bv-notempty-message' => 'Введите фамилию!',
                'placeholder' => 'Фамилия'
            ]
        ],
        'first_name' => [
            'label' => 'Имя:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'first_name',
                'data-bv-notempty',
                'data-bv-notempty-message' => 'Введите имя!',
                'placeholder' => 'Имя'
            ]
        ],
        'email' => [
            'label' => 'E-mail:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'email',
                'data-bv-notempty',
                'data-bv-notempty-message' => 'E-mail адрес обязателен!',
                'placeholder' => 'e-mail'
            ]

        ]
    ]
];