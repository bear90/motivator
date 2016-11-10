<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       10.11.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\models\forms;


class BannerSite extends \CFormModel
{
    public $name;
    public $width;
    public $height;

    public function rules(){
        return [
            ['name, width, height', 'required'],
            ['width', 'numerical',
                'min' => 10,
                'max' => 1024,
                'tooSmall' => 'Ширина должна быть не менее 10 пикселей',
                'tooBig' => 'Ширина должна быть не более 1024 пикселей'],
            ['height', 'numerical',
                'min' => 10,
                'max' => 1024,
                'tooSmall' => 'Высота должна быть не менее 10 пикселей',
                'tooBig' => 'Высота должна быть не более 1024 пикселей'],
        ];
    }

    public function attributeLabels(){
        return [
            'name' => 'Название',
        ];
    }
}