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

namespace application\models\Entity\Offer;
use application\models\entities;
use application\models\defines\Offer;

class Helper
{

    public static function showForTouragent(entities\Offer $offer, $touragentId) {
        return !is_null($touragentId) && $touragentId == $offer->touragentId;
    }

    public static function getHtmlClass(entities\Offer $offer, $touragentId)
    {
        $classes = [];
        switch ($offer->type) {
            case Offer\Type::FAVORITE:
                $classes[] = 'favorite';
                break;

            case Offer\Type::NOT_PRIORITY:
                $classes[] = 'not-priority';
                break;
            
            default:
                $classes[] = 'common';
        }

        if (!is_null($touragentId) && $touragentId != $offer->touragentId) {
            $classes[] = 'hidden';
        }

        return implode(" ", $classes);
    }
}
