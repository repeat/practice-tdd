<?php
namespace Repeat\PracticeTDD\Tests;

use PHPUnit\Framework\TestCase;
use Repeat\PracticeTDD\FriendlyDateTime;

class FriendlyDateTimeTest extends TestCase
{
    /**
     * @dataProvider dataPrint
     */
    public function testPrint($input, $expected)
    {
        $friendly = new FriendlyDateTime($input);
        $actual = $friendly->print();
        $this->assertSame($expected, $actual);
    }

    public function dataPrint()
    {
        return [
            [1514735999, '2017 年 12 月 31 日 23:59'],
            [1514736000, '1 月 1 日 00:00'],
            [1535738584, '9 月 1 日 02:03'],
        ];
    }

    /**
     * @dataProvider dataPrintWithTimezone
     */
    public function testPrintWithTimezone($input, $expected)
    {
        $friendly = new FriendlyDateTime($input, 'UTC');
        $actual = $friendly->print();
        $this->assertSame($expected, $actual);
    }

    public function dataPrintWithTimezone()
    {
        return [
            [1514735999, '2017 年 12 月 31 日 23:59'],
            [1514736000, '1 月 1 日 00:00'],
            [1535738584, '8 月 31 日 18:03'],
        ];
    }
}
