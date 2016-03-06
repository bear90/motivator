<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('tourist/ordertour'),
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
            'label' => 'Выберите турагента:',
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
            ]
        ],
        'endDate' => [
            'label' => 'Ориентировочная дата окончания тура:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'endDate',
            ]
        ]
    ]
];