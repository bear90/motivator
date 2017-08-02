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


class Code extends BaseEntity
{
    public function rules(){
        return [
            ['code', 'required'],
            ['comment, expiredAt', 'type', 'type' => 'string'],
            ['deleted, type, hidden', 'type', 'type' => 'integer'],
        ];
    }

    public function relations()
    {
        return [];
    }

    public function tableName()
    {
        return 'tbl_code';
    }
}
