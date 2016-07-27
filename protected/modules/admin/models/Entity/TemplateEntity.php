<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       17.06.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\models\Entity;


class TemplateEntity extends  \CActiveRecord
{
    public function rules(){
        return [
            ['key', 'required'],
            ['content, comment, subject', 'safe']
        ];
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'template';
    }
}