<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       10.01.2017
 * @package
 * @copyright   Copyright (c) 2015-2017 soXes GmBh.
 *
 */

namespace application\modules\admin\models\forms;


class Banner extends \CFormModel
{
    public $banner;
    public $width;
    public $height;

    public function rules(){
        return [
            ['banner', 'file',
                'types' => ['jpg', 'gif', 'png'],
                'allowEmpty' => true,
                'maxSize' => 10 * 1024 * 1024,    // 10 MB
                'tooLarge' => 'Размер файла "{file}" слишком велик, он не должен превышать 10 Мегабайт.',
                'message' => 'Выберите изображение!'
            ],
        ];
    }

    public function attributeLabels(){
        return [
            'banner' => 'Банер',
        ];
    }
}
