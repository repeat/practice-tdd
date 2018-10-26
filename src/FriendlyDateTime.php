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

        if ($from->diffInSeconds($to) <= 60) {
            return '剛剛';
        }
        if ($from->diffInHours($to) < 1) {
            return $from->diffInMinutes($to) . ' 分鐘前';
        }
        if ($from->diffInDays($to) < 1) {
            return $from->diffInHours($to) . ' 小時前';
        }
        if ($from->diffInDays($to) < 2) {
            $fromMidnight = Carbon::parse($from->toDateString());
            $toMidnight = Carbon::parse($to->toDateString());
            if (1 === $fromMidnight->diffInDays($toMidnight)) {
                return $from->format('昨天 H:i');
            }
            return $from->format('前天 H:i');
        }
        if ($from->diffInSeconds($to) <= (365 * 24 * 60 * 60)) {
            return $from->format('n 月 j 日 H:i');
        }
        return $from->format('Y 年 n 月 j 日');
    }
}
