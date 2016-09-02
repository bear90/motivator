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
        ],
        'boss' => [
            'label' => 'Должность и ФИО руководителя:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touroperator[boss]',
            ]
        ],
        'document' => [
            'label' => 'Основания  полномочий руководителя:',
            'type' => 'text',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touroperator[document]',
            ]
        ],
        'requisite' => [
            'label' => 'Реквизиты:',
            'type' => 'textarea',
            'layout' => '{label}{input}{error}',
            'attributes' => [
                'class' => 'form-control',
                'name' => 'Touroperator[requisite]',
            ]
        ]
    ]
];