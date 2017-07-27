<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => '',
    'attributes' => [
        'class' => 'phone-code-form form-inline',
    ],
    'elements' => [
        'date_from' => [
            'label' => 'С:',
            'type' => 'text',
            'layout' => '{label} {input}{error}',
            'attributes' => [
                'class' => 'form-control datepicker',
                'name' => 'date_from',
            ]
        ],
        'date_to' => [
            'label' => 'По:',
            'type' => 'text',
            'layout' => '{label} {input}{error}',
            'attributes' => [
                'class' => 'form-control datepicker',
                'name' => 'date_to',
            ]
        ],
    ]
];
