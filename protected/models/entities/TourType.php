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


class TourType extends BaseEntity
{
    public function rules(){
        return [
            ['name', 'required']
        ];
    }

    public function tableName()
    {
        return 'tbl_tour_type';
    }
}
