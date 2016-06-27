<?php
/**
 * @author soza.mihail@gmail.com
 */

return [
    'action' => Yii::app()->createUrl('/'),
    'elements' => [
        'name' => [
            'label' => 'Название:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touragent[name]',
            ]
        ],
        'site' => [
            'label' => 'Сайт:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touragent[site]',
            ]
        ]
    ]
];