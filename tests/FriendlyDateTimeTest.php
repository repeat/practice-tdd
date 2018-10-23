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
            ['2017 年 12 月 31 日 23:59', 1514735999, 1540166400],
            ['1 月 1 日 00:00', 1514736000, 1540166400],
            ['9 月 1 日 02:03', 1535738584, 1540166400],
            [
                '30 天前',
                1538323200, // 2018/10/01 00:00:00
                1540915200, // 2018/10/31 00:00:00
            ],
        ];
    }
}
