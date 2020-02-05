<?php

namespace Repeat\PracticeTDD;

use Carbon\Carbon;

class Mask
{
    public static function isValidDateRange(Carbon $now): bool
    {
        $effective_date = Carbon::parse('2020/02/06 0:00:00 Asia/Taipei');
        $now = Carbon::now();

        return $now->greaterThanOrEqualTo($effective_date);
    }
}
