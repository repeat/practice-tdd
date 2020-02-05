<?php

namespace Repeat\PracticeTDD\Tests;

use PHPUnit\Framework\TestCase;
use Carbon\Carbon;
use Repeat\PracticeTDD\Mask;

class MaskTest extends TestCase
{
    public function tearDown(): void
    {
        Carbon::setTestNow();
    }

    public function testIsValidDateRangeTrue(): void
    {
        Carbon::setTestNow(Carbon::parse('2020/02/06 0:00:00'));
        $this->assertTrue(Mask::isValidDateRange());
    }

    public function testIsValidDateRangeFalse(): void
    {
        Carbon::setTestNow(Carbon::parse('2020/02/05 23:59:59'));
        $this->assertFalse(Mask::isValidDateRange());
    }
}
