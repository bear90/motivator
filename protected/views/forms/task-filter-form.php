<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('/#block-main-table'),
    'method' => 'GET',
    'attributes' => [
        'class' => 'filter-task-form',
    ],
    'elements' => [
        'country' => [
            'type' => 'dropdownlist',
            'layout' => '{input}',
            'items' => ['Все страны'] + application\models\Entity\Country::getOptions(),
            'attributes' => [
                'id' => '',
                'name' => 'country',
                'class' => 'form-control'
            ]
        ],
        'startedAtAny' => [
            'type' => 'checkbox',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'startedAtAny',
            ]

        ],
        'startedAtFrom' => [
            'label' => 'От',
            'type' => 'text',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'startedAtFrom',
                'class' => 'form-control datepicker'
            ]

        ],
        'startedAtTo' => [
            'label' => 'До',
            'type' => 'text',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'startedAtTo',
                'class' => 'form-control datepicker'
            ]

        ],
        'adultCount' => [
            'type' => 'dropdownlist',
            'layout' => '{input}',
            'items' => ['Любое количество', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 100 => 'Более 10-ти'],
            'attributes' => [
                'name' => 'adults',
                'class' => 'form-control'
            ]
        ],
    ]
];
