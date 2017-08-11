<?php
/**
 * @author soza.mihail@gmail.com
 */

return [
    'action' => Yii::app()->createUrl('/'),
//    'enctype' => 'multipart/form-data',
    'elements' => [
        'name' => [
            'label' => 'Наименование:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touragent[name]',
            ]
        ],
        'site' => [
            'label' => 'Сайт:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touragent[site]',
            ]
        ],
        'password' => [
            'label' => 'Пароль:',
            'type' => 'password',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touragent[password]',
            ]
        ],
        'password2' => [
            'label' => 'Повторите пароль:',
            'type' => 'password',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touragent[password2]',
            ]
        ],
    ]
];