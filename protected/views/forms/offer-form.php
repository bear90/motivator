<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => Yii::app()->createUrl('offer/add'),
    'attributes' => [
        'class' => 'add-offer-form',
    ],
    'elements' => [
        'contact' => [
            'label' => 'Укажите интернет ссылку на сайт вашего турагентства, а также ваше имя и контактные данные',
            'type' => 'textarea',
            'layout' => '{label}{input}',
            'attributes' => [
                'id' => '',
                'name' => 'offer[contact]',
                'class' => 'form-control'
            ]
        ],
        'description' => [
            'label' => 'Укажите интернет ссылку на тур и дополнительную информацию о нём',
            'type' => 'textarea',
            'layout' => '{label}{input}',
            'attributes' => [
                'id' => '',
                'name' => 'offer[description]',
                'class' => 'form-control'
            ]
        ],
        'priceType' => [
            'label' => 'Выберите режим продажи тура:',
            'type' => 'dropdownlist',
            'layout' => '{input}',
            'items' => ['' => ''] + application\models\defines\Offer\PriceType::getOptions(),
            'attributes' => [
                'name' => 'offer[priceType][]',
                'class' => 'form-control'
            ]
        ],
        'price' => [
            'label' => 'Укажите стоимость тура в $:',
            'type' => 'text',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'offer[price][]',
                'class' => 'form-control price',
            ]
        ],
        'taskId' => [
            'type' => 'hidden',
            'layout' => '{label}{input}',
            'attributes' => [
                'name' => 'offer[taskId]',
                'class' => 'form-control'
            ]
        ],
    ]
];
