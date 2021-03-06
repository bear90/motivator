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

class UserName extends BaseEntity
{
    public function rules(){
        return [
            ['name, type', 'required']
        ];
    }

    public function tableName()
    {
        return 'tbl_user_name';
    }
}
