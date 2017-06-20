<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    'action' => '',
    'attributes' => [
        'class' => 'add-country-form',
    ],
    'elements' => [
        'name' => [
            'label' => 'Страна:',
            'type' => 'text',
            //'layout' => '{label}{input}{error}',
            'attributes' => [
                'name' => 'country[name]',
                'class' => 'form-control'
            ]
        ]
    ]
];
