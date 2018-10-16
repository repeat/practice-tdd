<?php
namespace Repeat\PracticeTDD;

use Carbon\Carbon;

/**
 * FriendlyDateTime 友善的日期時間格式
 */
class FriendlyDateTime
{
    protected $timestamp;
    protected $timezone;

    public function __construct(int $timestamp, string $timezone = "Asia/Taipei")
    {
        $this->timezone = $timezone;
        $this->timestamp = $timestamp;
    }

    /**
     * print 印出時間
     *
     * @return string 指定的時間格式
     */
    public function print()
    {
        $result = Carbon::createFromTimestamp($this->timestamp, $this->timezone);

        if ($result->isSameYear()) {
            return $result->format('n 月 j 日 H:i');
        }
        return $result->format('Y 年 n 月 j 日 H:i');
    }
}
