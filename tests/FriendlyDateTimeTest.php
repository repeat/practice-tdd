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
                '2017 年 12 月 31 日',
                1514735999, // 2017/12/31 23:59:59 UTC+8
                1546272000, // 2019/01/01 00:00:00 UTC+8
            ],
            [
                '1 月 1 日 00:00',
                1514736000, // 2018/01/01 00:00:00 UTC+8
                1546272000, // 2019/01/01 00:00:00 UTC+8
            ],
        ];
    }
}
