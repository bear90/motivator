<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       11.07.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */
return [
    'action' => Yii::app()->createUrl('/'),
    'elements' => [
        'comment' => [
            'label' => 'Название:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Template[comment]',
            ]
        ],
        'content' => [
            'label' => 'Шаблон:',
            'type' => 'textarea',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Template[content]',
            ]
        ]
    ]
];