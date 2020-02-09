<?php

namespace Repeat\PracticeTDD;

use Carbon\Carbon;

class Mask
{
    const EFFECTIVE_DATE = '2020/02/06';

    /**
     * @codeCoverageIgnore
     */
    public function __construct()
    {
        date_default_timezone_set('Asia/Taipei');
    }

    public static function isValidDateRange(): bool
    {
        $effective_date = Carbon::parse(self::EFFECTIVE_DATE);
        $now = Carbon::now();

        return $now->greaterThanOrEqualTo($effective_date);
    }

    public static function isValidWeekday(int $final): bool
    {
        $finals = range(0, 9);
        if (!in_array($final, $finals)) {
            throw new \InvalidArgumentException('身份證字號的尾數不正確');
        }

        $now = Carbon::now();
        $weekday = (int) $now->format('N');
        if (7 === $weekday) {
            return true;
        }
        
        $is_even = (0 === $final % 2);
        if ($is_even) {
            return 0 === $weekday % 2;
        }
        return 1 === $weekday % 2;
    }
}
