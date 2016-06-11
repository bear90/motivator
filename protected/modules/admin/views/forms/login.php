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
        ]
    ]
];