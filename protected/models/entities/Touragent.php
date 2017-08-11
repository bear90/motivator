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


class Touragent extends BaseEntity
{
    public function rules(){
        return [
            ['name, site, userId', 'required'],
            ['status', 'type', 'type' => 'integer'],
        ];
    }

    public function relations()
    {
        return [
            'user' => [self::BELONGS_TO, 'application\\models\\User', 'userId'],
        ];
    }

    public function tableName()
    {
        return 'tbl_touragent';
    }
}
