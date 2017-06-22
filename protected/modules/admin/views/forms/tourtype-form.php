<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => '',
    'attributes' => [
        'class' => 'add-tourtype-form',
    ],
    'elements' => [
        'name' => [
            'label' => 'Вид тура:',
            'type' => 'text',
            //'layout' => '{label}{input}{error}',
            'attributes' => [
                'name' => 'tourtype[name]',
                'class' => 'form-control'
            ]
        ]
    ]
];
