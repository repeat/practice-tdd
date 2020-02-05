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

    /**
     * @dataProvider dataIsValidEvenWeekdayTrue
     */
    public function testIsValidEvenWeekdayTrue(String $weekday, int $final): void
    {
        Carbon::setTestNow(Carbon::parse($weekday));
        $this->assertTrue(Mask::isValidWeekday($final));
    }

    public function dataIsValidEvenWeekdayTrue(): array
    {
        $weekdays = [
            'Tuesday',
            'Thursday',
            'Saturday',
            'Sunday',
        ];
        $evens = [2, 4, 6, 8, 0];
        $data = [];

        foreach ($weekdays as $weekday) {
            foreach ($evens as $even) {
                $data[] = [$weekday, $even];
            }
        }

        return $data;
    }

    /**
     * @dataProvider dataIsValidEvenWeekdayFalse
     */
    public function testIsValidEvenWeekdayFalse(String $weekday, int $final): void
    {
        Carbon::setTestNow(Carbon::parse($weekday));
        $this->assertFalse(Mask::isValidWeekday($final));
    }

    public function dataIsValidEvenWeekdayFalse(): array
    {
        $weekdays = [
            'Monday',
            'Wednesday',
            'Friday',
        ];
        $evens = [2, 4, 6, 8, 0];
        $data = [];

        foreach ($weekdays as $weekday) {
            foreach ($evens as $even) {
                $data[] = [$weekday, $even];
            }
        }

        return $data;
    }
}
