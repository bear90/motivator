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


class TouragentOffer extends BaseEntity
{
    public function rules(){
        return [
            ['touragentId, offerId', 'required'],
        ];
    }

    public function relations()
    {
        return [
            'touragent' => [self::BELONGS_TO, 'application\\models\\Touragent', 'touragentId'],
            'offer' => [self::BELONGS_TO, 'application\\models\\Offer', 'offerId'],
        ];
    }

    public function tableName()
    {
        return 'tbl_touragent_offer';
    }
}
