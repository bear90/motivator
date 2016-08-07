<?php
/**
 * @author soza.mihail@gmail.com
 */

return [
    'action' => Yii::app()->createUrl('/'),
    'elements' => [
        'name' => [
            'label' => 'ФИО:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'TouragentManager[name]',
            ]
        ],
        'boss' => [
            'label' => 'Руководитель:',
            'type' => 'checkbox',
            'layout' => '{input}{error}',
            'attributes' => [
                'name' => 'TouragentManager[boss]',
            ]
        ],
        'description' => [
            'label' => 'Блок данных менеджера:',
            'type' => 'textarea',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control tiny-text',
                'name' => 'TouragentManager[description]',
            ]
        ]
    ]
];