<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('/'),
    'elements' => [
        'password' => [
            'label' => 'Пароль:',
            'type' => 'password',
            'layout' => '{label}{input}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'password',
            ]
        ],
        'verifyCode' => [
            'label' => 'Введите текст с картинки:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'verifyCode',
                'class' => 'form-control',
                'autocomplete' => 'off'
            ]

        ],
    ]
];