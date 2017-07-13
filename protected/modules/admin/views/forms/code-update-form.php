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
                'value' => 'update',
            ]
        ],
        'code' => [
            'type' => 'checkbox',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'code[]',
            ]
        ],
    ]
];
