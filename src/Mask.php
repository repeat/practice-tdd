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
        $now = Carbon::now();
        $is_even = (0 === $final % 2);
        $weekday = (int) $now->format('N');
        $weekdays = [
            'even' => [2, 4, 6, 7],
            'odd' => [1, 3, 5, 7],
        ];
        $valid_weekdays = $weekdays['odd'];
        if ($is_even) {
            $valid_weekdays = $weekdays['even'];
        }

        if (in_array($weekday, $valid_weekdays)) {
            return true;
        }

        return false;
    }
}
