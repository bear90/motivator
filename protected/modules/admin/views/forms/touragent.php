<?php
/**
 * @author soza.mihail@gmail.com
 */

return [
    'action' => Yii::app()->createUrl('/'),
    'enctype' => 'multipart/form-data',
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
        'address' => [
            'label' => 'Адрес:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touragent[address]',
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
        'logo' => [
            'label' => 'Логотип:',
            'type' => 'file',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'name' => 'Touragent[logo]',
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
        'repeate' => [
            'label' => 'Повторите пароль:',
            'type' => 'password',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touragent[repeate]',
            ]
        ],
        'currencyFactorEur' => [
            'label' => 'Коэфициент для евро:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touragent[currencyFactorEur]',
            ]
        ],
        'currencyFactorUsd' => [
            'label' => 'Коэфициент для доллара:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touragent[currencyFactorUsd]',
            ]
        ]
    ]
];