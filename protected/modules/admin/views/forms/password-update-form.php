<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => '',
    'attributes' => [
        'class' => 'generate-update-form',
    ],
    'elements' => [
        'action' => [
            'type' => 'hidden',
            'attributes' => [
                'name' => 'action',
                'value' => 'showall',
            ]
        ],
        'showall' => [
            'type' => 'checkbox',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'showall',
            ]
        ],
        'password' => [
            'type' => 'checkbox',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'password[]',
            ]
        ],
    ]
];
