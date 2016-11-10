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

class Banner extends DBEntity
{
    public function rules(){
        return [
        ];
    }

    public function relations()
    {
        return [
            'bannerSite'=>[self::BELONGS_TO, 'application\\models\\BannerSite', 'siteId'],
        ];
    }

    public function tableName()
    {
        return 'banner';
    }
}