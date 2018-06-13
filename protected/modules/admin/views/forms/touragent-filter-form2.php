<?php
/**
 * @author soza.mihail@gmail.com
 */

return [
    'action' => Yii::app()->createUrl('/admin/touragent'),
    'class' => 'form-inline filter',
    'elements' => [
        'name' => [
            'type' => 'text',
            'layout' => '{input}',
            'attributes' => [
                'id' => '',
                'placeholder' => 'Название турагента',
                'class' => 'form-control',
                'name' => 'name',
            ]
        ]
    ]
];