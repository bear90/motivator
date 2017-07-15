<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => '',
    'attributes' => [
        'class' => 'generate-password-form',
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
            'label' => 'Количество паролей:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'count',
            ]
        ],
    ]
];
