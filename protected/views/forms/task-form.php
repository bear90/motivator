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
        'name' => [
            'label' => 'Укажите своё имя:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => application\models\Entity\User\Name::getOptions(),
            'attributes' => [
                'name' => 'name',
                'class' => 'form-control'
            ]
        ],
        'country' => [
            'label' => 'Укажите страну/страны тура:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => application\models\Entity\Country::getOptions(),
            'attributes' => [
                'name' => 'country',
                'class' => 'form-control'
            ]
        ],
        'tourType' => [
            'label' => 'Укажите вид тура:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => application\models\Entity\Tour\Type::getOptions(),
            'attributes' => [
                'name' => 'tourType',
                'class' => 'form-control'
            ]

        ],
        'adultCount' => [
            'label' => 'Укажите количество взрослых туристов:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => [1 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            'attributes' => [
                'name' => 'adultCount',
                'class' => 'form-control'
            ]

        ],
        'childCount' => [
            'label' => 'Укажите количество детей:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => ['Нет', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            'attributes' => [
                'class' => 'form-control',
                'name' => 'childCount',
            ]

        ],
        'days' => [
            'label' => 'Укажите продолжительность тура (дней):',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => [1=>1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17,
            18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
            'attributes' => [
                'name' => 'days',
                'class' => 'form-control'
            ]

        ],
        'startedAt' => [
            'label' => 'Укажите предполагаемую дату начала тура:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'startedAt',
                'class' => 'form-control'
            ]

        ],
        'email' => [
            'label' => 'Укажите свой e-mail:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'email',
                'class' => 'form-control'
            ]

        ],
        'verifyCode' => [
            'type' => 'text',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'verifyCode',
                'class' => 'form-control'
            ]

        ],
    ]
];
