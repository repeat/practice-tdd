<?php
namespace Repeat\PracticeTDD\Tests;

use PHPUnit\Framework\TestCase;
use Repeat\PracticeTDD\FriendlyDateTime;

class FriendlyDateTimeTest extends TestCase
{
    /**
     * @dataProvider dataPrint
     */
    public function testPrint($expected, $comparedFrom, $comparedTo)
    {
        $friendly = new FriendlyDateTime($comparedFrom, $comparedTo);
        $actual = $friendly->print();
        $this->assertSame($expected, $actual);
    }

    public function dataPrint()
    {
        return [
            [
                '剛剛',
                1514736000, // 2018/01/01 00:00:00 Asia/Taipei
                1514736059, // 2018/01/01 00:00:59 Asia/Taipei
            ],
            [
                '1 分鐘前',
                1514736000, // 2018/01/01 00:00:00 Asia/Taipei
                1514736060, // 2018/01/01 00:01:00 Asia/Taipei
            ],
            [
                '59 分鐘前',
                1514736000, // 2018/01/01 00:00:00 Asia/Taipei
                1514739599, // 2018/01/01 00:59:59 Asia/Taipei
            ],
            [
                '1 小時前',
                1514736000, // 2018/01/01 00:00:00 Asia/Taipei
                1514739600, // 2018/01/01 01:00:00 Asia/Taipei
            ],
            [
                '23 小時前',
                1514736000, // 2018/01/01 00:00:00 Asia/Taipei
                1514822399, // 2018/01/01 23:59:59 Asia/Taipei
            ],
            [
                '昨天 00:00',
                1514736000, // 2018/01/01 00:00:00 Asia/Taipei
                1514822400, // 2018/01/02 00:00:00 Asia/Taipei
            ],
            [
                '前天 23:59',
                1514822399, // 2018/01/01 23:59:59 Asia/Taipei
                1514908800, // 2018/01/03 00:00:00 Asia/Taipei
            ],
            [
                '1 月 1 日 00:00',
                1514736000, // 2018/01/01 00:00:00 Asia/Taipei
                1514908800, // 2018/01/03 00:00:00 Asia/Taipei
            ],
            [
                '1 月 1 日 00:00',
                1514736000, // 2018/01/01 00:00:00 Asia/Taipei
                1546272000, // 2019/01/01 00:00:00 Asia/Taipei
            ],
            [
                '2017 年 12 月 31 日',
                1514735999, // 2017/12/31 23:59:59 Asia/Taipei
                1546272000, // 2019/01/01 00:00:00 Asia/Taipei
            ],
        ];
    }
}
