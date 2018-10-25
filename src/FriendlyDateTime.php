<?php
namespace Repeat\PracticeTDD;

use Carbon\Carbon;

/**
 * FriendlyDateTime 友善的日期時間格式
 */
class FriendlyDateTime
{
    protected $comparedFrom;
    protected $comparedTo;

    public function __construct(int $comparedFrom, int $comparedTo)
    {
        $this->comparedFrom = $comparedFrom;
        $this->comparedTo = $comparedTo;
    }

    /**
     * print 印出時間
     *
     * @return string 指定的時間格式
     */
    public function print()
    {
        $from = Carbon::createFromTimestamp($this->comparedFrom, 'Asia/Taipei');
        $to = Carbon::createFromTimestamp($this->comparedTo, 'Asia/Taipei');

        if ($from->diffInMinutes($to) < 1) {
            return '剛剛';
        }

        if ($from->diffInSeconds($to) > (365 * 24 * 60 * 60)) {
            return $from->format('Y 年 n 月 j 日');
        }

        return $from->format('n 月 j 日 H:i');
    }
}
