<?php
namespace Repeat\PracticeTDD\Tests;

use PHPUnit\Framework\TestCase;
use Repeat\PracticeTDD\FriendlyDateTime;

class FriendlyDateTimeTest extends TestCase
{
    public function testPrint()
    {
        $expected = '2018 年 9 月 1 日 2:03:04';
        $friendly = new FriendlyDateTime(1535767384);
        $actual = $friendly->print();
        $this->assertSame($expected, $actual);
    }
}
