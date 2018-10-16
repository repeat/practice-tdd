<?php
namespace Repeat\PracticeTDD;

use Carbon\Carbon;

/**
 * FriendlyDateTime 友善的日期時間格式
 */
class FriendlyDateTime
{
    protected $timestamp;

    public function __construct(int $timestamp, string $timezone = "Asia/Taipei")
    {
        date_default_timezone_set($timezone);
        $this->timestamp = $timestamp;
    }

    /**
     * print 印出時間
     *
     * @return string 指定的時間格式
     */
    public function print()
    {
        $result = Carbon::createFromTimestamp($this->timestamp);
        return $result->format('Y 年 n 月 j 日 H:i');
    }
}
