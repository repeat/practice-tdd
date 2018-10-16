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
            [1535738584, '2018 年 9 月 1 日 02:03'],
        ];
    }

    public function testPrintWithTimezone()
    {
        $expected = '2018 年 8 月 31 日 18:03';
        $friendly = new FriendlyDateTime(1535738584, 'UTC');
        $actual = $friendly->print();
        $this->assertSame($expected, $actual);
    }
}
