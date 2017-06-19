<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => '',
    'attributes' => [
        'class' => 'add-name-form',
    ],
    'elements' => [
        'name' => [
            'label' => 'Имя:',
            'type' => 'text',
            //'layout' => '{label}{input}{error}',
            'attributes' => [
                'name' => 'username[name]',
                'class' => 'form-control'
            ]
        ],
        'type' => [
            'type' => 'hidden',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'username[type]',
            ]
        ],
    ]
];
