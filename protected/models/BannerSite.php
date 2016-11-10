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

namespace application\models;


use application\components\DBEntity;

class BannerSite extends DBEntity
{
    public function rules(){
        return [
            ['name, width, height', 'required'],
            ['name', 'type', 'type' => 'string'],
            ['width, height', 'type', 'type' => 'integer'],
        ];
    }

    public function relations()
    {
        return [
            'banners'=>[self::HAS_MANY, 'application\\models\\Banner', 'siteId'],
        ];
    }

    public function tableName()
    {
        return 'banner_site';
    }
}