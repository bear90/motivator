<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\models\defines\Offer;


class PriceType
{
    const GENERAL = 0;

    const EARLY_BOOKING = 1;

    const LASTMINUTE_TOUR = 2;

    public static function getOptions() 
    {
        return [
            self::GENERAL => 'Обычная продажа',
            self::EARLY_BOOKING => 'Раннее бронирование',
            self::LASTMINUTE_TOUR => 'Горящий тур',
        ];
    }
}