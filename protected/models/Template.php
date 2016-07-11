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

namespace application\models;

use application\components\DBEntity;

class Template extends DBEntity
{
    public function rules(){
        return [
            ['key', 'required'],
            ['key, content, comment', 'safe']
        ];
    }

    public function tableName()
    {
        return 'template';
    }
}