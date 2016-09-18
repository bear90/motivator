<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('/'),
    'elements' => [
        'password' => [
            'label' => 'Новый пароль:',
            'type' => 'password',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'password',
            ]
        ],
        'password2' => [
            'label' => 'Повторить новый пароль:',
            'type' => 'password',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'password2',
            ]
        ]
    ]
];