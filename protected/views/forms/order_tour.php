<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('user/ordertour'),
    'attributes' => [
        'class' => 'request-head-block clearfix addForm',
    ],
    'elements' => [
        'site' => [
            'label' => 'Для выбора  тура и турагента ознакомьтесь с предложениями от партнёров системы «МОТИВАТОР»:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => \application\models\Touragent::getSiteOptions(),
            'attributes' => [
                'name' => 'site',
            ]
        ],
        'touragent' => [
            'label' => 'Выбранный турагент:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => \application\models\Touragent::getOptions(),
            'attributes' => [
                'name' => 'touragentId',
            ]
        ],
        'city' => [
            'label' => 'Укажите страну отдыха:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'city[]'
            ]
        ],
        'startDate' => [
            'label' => 'Ориентировочная дата начала тура:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'startDate',
                'class' => 'startDate',
            ]
        ],
        'endDate' => [
            'label' => 'Ориентировочная дата окончания тура:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'endDate',
                'class' => 'endDate',
            ]
        ],
        // When order first tour
        'middleName' => [
            'label' => 'Отчество:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'tourist[middleName]'
            ]
        ],
        'phone' => [
            'label' => 'Номер телефона:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'placeholder' => "+375 XX XX XX XXX",
                'autocomplete' => 'off',
                'name' => 'tourist[phone]'
            ]
        ],
    ]
];