<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       06.06.2017
 * @package
 * @copyright   Copyright (c) 2015-2017 soXes GmBh.
 *
 */

namespace application\models\entities;


class Template extends BaseEntity
{
    public function rules(){
        return [
            ['key', 'required'],
            ['content, comment, subject', 'safe']
        ];
    }

    public function relations()
    {
        return [];
    }

    public function tableName()
    {
        return 'tbl_template';
    }
}
