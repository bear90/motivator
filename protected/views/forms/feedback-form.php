<?php
/**
 * @author soza.mihail@gmail.com
 */
return [
    //'action' => Yii::app()->createUrl('api/send-feedback'),
    'attributes' => [
        'class' => 'feedback-form hidden',
    ],
    'elements' => [
        'feedback' => [
            'type' => 'textarea',
            'layout' => '{input}',
            'attributes' => [
                'id' => '',
                'name' => 'feedback',
                'class' => 'form-control'
            ]
        ],
    ]
];
