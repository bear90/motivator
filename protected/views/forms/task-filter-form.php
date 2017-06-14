<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('task/add'),
    'attributes' => [
        'class' => 'add-task-form',
    ],
    'elements' => [
        'country' => [
            'type' => 'dropdownlist',
            'layout' => '{input}',
            'items' => ['Все страны'] + application\models\Entity\Country::getOptions(),
            'attributes' => [
                'id' => '',
                'name' => 'filter[country]',
                'class' => 'form-control'
            ]
        ],
        'startedAtAny' => [
            'type' => 'checkbox',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'filter[startedAtAny]',
            ]

        ],
        'startedAtFrom' => [
            'label' => 'От',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'filter[startedAtFrom]',
                'class' => 'form-control datepicker'
            ]

        ],
        'startedAtTo' => [
            'label' => 'До',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'filter[startedAtTo]',
                'class' => 'form-control datepicker'
            ]

        ],
        'adultCount' => [
            'type' => 'dropdownlist',
            'layout' => '{input}',
            'items' => [1 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 100 => 'Более 10-ти'],
            'attributes' => [
                'name' => 'filter[adultCount]',
                'class' => 'form-control'
            ]
        ],
    ]
];
