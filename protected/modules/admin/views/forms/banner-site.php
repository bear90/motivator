<?php
/**
 * @author soza.mihail@gmail.com
 */

return [
    'action' => Yii::app()->createUrl('/admin/banner/add'),
    'elements' => [
        'name' => [
            'label' => 'Название:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'BannerSite[name]',
            ]
        ],
        'width' => [
            'label' => 'Ширина блока:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'BannerSite[width]',
            ]
        ],
        'height' => [
            'label' => 'Высота блока:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'BannerSite[height]',
            ]
        ],
    ]
];