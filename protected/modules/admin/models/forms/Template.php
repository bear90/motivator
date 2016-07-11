<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       11.07.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\models\forms;


class Template extends \CFormModel
{
    public $comment;
    public $content;

    public function rules(){
        return array(
            array('comment, content', 'required'),
        );
    }

    public function attributeLabels(){
        return [
            'comment' => 'Название',
            'content' => 'Шаблон'
        ];
    }
}