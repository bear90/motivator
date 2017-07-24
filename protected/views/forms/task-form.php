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
            'label' => 'мужское',
            'type' => 'dropdownlist',
            'layout' => '{input}',
            'items' => [''] + application\models\Entity\User\Name::getOptions1(),
            'attributes' => [
                'name' => 'task[name1]',
                'class' => 'form-control filtered-select'
            ]
        ],
        'name2' => [
            'label' => 'женское',
            'type' => 'dropdownlist',
            'layout' => '{input}',
            'items' => [''] + application\models\Entity\User\Name::getOptions2(),
            'attributes' => [
                'name' => 'task[name2]',
                'class' => 'form-control filtered-select'
            ]
        ],
        'country' => [
            'label' => 'Укажите страну/страны тура:',
            'type' => 'dropdownlist',
            'layout' => '{input}',
            'items' => ['' => ''] + application\models\Entity\Country::getOptions(),
            'attributes' => [
                'id' => '',
                'name' => 'task[country][]',
                'class' => 'form-control country filtered-select'
            ]
        ],
        'tourType' => [
            'label' => 'Укажите вид тура:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => ['' => ''] + application\models\Entity\Tour\Type::getOptions(),
            'attributes' => [
                'name' => 'task[tourType]',
                'class' => 'form-control'
            ]
        ],
        'adultCount' => [
            'label' => 'Укажите количество взрослых туристов:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => [''=>'', 1=>1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 100 => 'Более 10-ти'],
            'attributes' => [
                'name' => 'task[adultCount]',
                'class' => 'form-control'
            ]
        ],
        'childCount' => [
            'label' => 'Укажите количество детей:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => [''=>'', 'Нет', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            'attributes' => [
                'class' => 'form-control',
                'name' => 'task[childCount]',
            ]
        ],
        'childAge' => [
            'label' => 'Укажите возраст ребёнка:',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => [''=>'', 1 => '1 год', '2 года', '3 года', '4 года', '5 лет', '6 лет', '7 лет', '8 лет', '9 лет',
                        '10 лет', '11 лет', '12 лет', '13 лет', '14 лет', '15 лет', '16 лет'],
            'attributes' => [
                'class' => 'form-control',
                'name' => 'task[childAge][]',
            ]
        ],
        'days' => [
            'label' => 'Укажите продолжительность тура (дней):',
            'type' => 'dropdownlist',
            'layout' => '{label}{input}',
            'items' => [''=>'', 1=>1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17,
            18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
            'attributes' => [
                'name' => 'task[days]',
                'class' => 'form-control'
            ]

        ],
        'startedAt' => [
            'type' => 'text',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'task[startedAt]',
                'class' => 'form-control datepicker'
            ]

        ],
        'email' => [
            'label' => 'Укажите свой e-mail:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'task[email]',
                'class' => 'form-control'
            ]

        ],
        'verifyCode' => [
            'label' => 'Введите текст с картинки:',
            'type' => 'text',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'verifyCode',
                'class' => 'form-control',
                'autocomplete' => 'off'
            ]

        ],
        'checkbox' => [
            'label' => 'Введите текс с картинки:',
            'type' => 'checkbox',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'task[checkbox]',
            ]

        ],
    ]
];
