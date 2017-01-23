<?php
/**
 * @author soza.mihail@gmail.com
 */

return [
    'id' => 'upload-banner',
    'class' => 'hidden',
    'action' => Yii::app()->createUrl('/'),
    'enctype' => 'multipart/form-data',
    'elements' => [
        'banner' => [
            'label' => '',
            'type' => 'file',
            'layout' => '{input}',
            'attributes' => [
                'name' => 'banner',
            ]
        ],
    ]
];
