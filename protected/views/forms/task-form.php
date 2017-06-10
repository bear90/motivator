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
        'name1' => [
            'label' => 'Укажите своё имя:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => application\models\Entity\User\Name::getOptions1(),
            'attributes' => [
                'name' => 'name1',
                'class' => 'form-control'
            ]
        ],
        'name2' => [
            'label' => '&nbsp;',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => application\models\Entity\User\Name::getOptions2(),
            'attributes' => [
                'name' => 'name2',
                'class' => 'form-control'
            ]
        ],
        'country' => [
            'label' => 'Укажите страну/страны тура:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => application\models\Entity\Country::getOptions(),
            'attributes' => [
                'id' => '',
                'name' => 'country[]',
                'class' => 'form-control country'
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
        'childAge' => [
            'label' => 'Укажите возраст ребёнка:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => ['1 год', '2 года', '3 года', '4 года', '5 лет', '6 лет', '7 лет', '8 лет', '9 лет',
                        '10 лет', '11 лет', '12 лет', '13 лет', '14 лет', '15 лет', '16 лет'],
            'attributes' => [
                'class' => 'form-control',
                'name' => 'childAge[]',
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
                'class' => 'form-control datepicker'
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
            'label' => 'Введите текс с картинки:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'verifyCode',
                'class' => 'form-control'
            ]

        ],
    ]
];