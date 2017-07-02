<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('/'),
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