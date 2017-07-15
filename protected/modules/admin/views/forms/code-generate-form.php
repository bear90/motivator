<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => '',
    'attributes' => [
        'class' => 'generate-code-form',
    ],
    'elements' => [
        'action' => [
            'type' => 'hidden',
            'attributes' => [
                'name' => 'action',
                'value' => 'generate',
            ]
        ],
        'count' => [
            'label' => 'Количество кодов:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'count',
            ]
        ],
    ]
];
