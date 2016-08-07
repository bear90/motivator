<?php
/**
 * @author soza.mihail@gmail.com
 */

return [
    'action' => Yii::app()->createUrl('/'),
    'elements' => [
        'name' => [
            'label' => 'Наименование:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touroperator[name]',
            ]
        ]
    ]
];