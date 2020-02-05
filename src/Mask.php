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
}
