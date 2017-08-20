<?php
/**
 * @author soza.mihail@gmail.com
 */

return [
    'action' => Yii::app()->createUrl('/api/touragent-offers'),
    'class' => 'form-inline',
    'elements' => [
        'from' => [
            'type' => 'text',
            'layout' => '{input}',
            'attributes' => [
                'placeholder' => 'С',
                'class' => 'form-control datepicker',
                'name' => 'Filter[from]',
            ]
        ],
        'to' => [
            'type' => 'text',
            'layout' => '{input}',
            'attributes' => [
                'placeholder' => 'По',
                'class' => 'form-control datepicker',
                'name' => 'Filter[to]',
            ]
        ],
        'touragentId' => [
            'type' => 'hidden',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'Filter[touragentId]',
            ]
        ],
    ]
];