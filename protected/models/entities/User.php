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


class User extends BaseEntity
{
    private $salt = 'SaLtaSd';

    public function salt()
    {
        return $this->salt;
    }

    public function rules(){
        return [
            ['password, roleId', 'required'],
            ['code', 'type', 'type' => 'string'],
            ['hidden', 'type', 'type' => 'integer'],
        ];
    }

    public function relations()
    {
        return [
            'tourist'=>[self::HAS_ONE, 'application\\models\\Tourist', 'userId'],
            'touragent'=>[self::HAS_ONE, 'application\\models\\Touragent', 'userId'],
            'role'=>[self::BELONGS_TO, 'application\\models\\UserRole', 'roleId'],
        ];
    }

    public function tableName()
    {
        return 'tbl_user';
    }
}
