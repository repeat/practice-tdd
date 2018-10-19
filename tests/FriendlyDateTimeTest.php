<?php
namespace Repeat\PracticeTDD\Tests;

use PHPUnit\Framework\TestCase;
use Repeat\PracticeTDD\FriendlyDateTime;

class FriendlyDateTimeTest extends TestCase
{
    /**
     * @dataProvider dataPrint
     */
    public function testPrint($expected, $comparedFrom)
    {
        $friendly = new FriendlyDateTime($comparedFrom);
        $actual = $friendly->print();
        $this->assertSame($expected, $actual);
    }

    public function dataPrint()
    {
        return [
            ['2017 年 12 月 31 日 23:59', 1514735999,],
            ['1 月 1 日 00:00', 1514736000,],
            ['9 月 1 日 02:03', 1535738584,],
        ];
    }
}
