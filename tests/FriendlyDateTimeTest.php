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
            [1535767384, '2018 年 9 月 1 日 2:03'],
        ];
    }
}
