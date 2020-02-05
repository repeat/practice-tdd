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
     * @dataProvider dataIsValidOddWeekdayTrue
     */
    public function testIsValidWeekdayTrue(String $weekday, int $final): void
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
     * @dataProvider dataIsValidOddWeekdayFalse
     */
    public function testIsValidWeekdayFalse(String $weekday, int $final): void
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

    public function dataIsValidOddWeekdayTrue(): array
    {
        $weekdays = [
            'Monday',
            'Wednesday',
            'Friday',
            'Sunday',
        ];
        $odds = [1, 3, 5, 7, 9];
        $data = [];

        foreach ($weekdays as $weekday) {
            foreach ($odds as $odd) {
                $data[] = [$weekday, $odd];
            }
        }

        return $data;
    }

    public function dataIsValidOddWeekdayFalse(): array
    {
        $weekdays = [
            'Tuesday',
            'Thursday',
            'Saturday',
        ];
        $odds = [1, 3, 5, 7, 9];
        $data = [];

        foreach ($weekdays as $weekday) {
            foreach ($odds as $odd) {
                $data[] = [$weekday, $odd];
            }
        }

        return $data;
    }

    /**
     * @dataProvider dataIsValidWeekdayNonFinal
     */
    public function testIsValidWeekdayNonFinal(int $final): void
    {
        $this->expectException('InvalidArgumentException');
        Mask::isValidWeekday($final);
    }

    public function dataIsValidWeekdayNonFinal(): array
    {
        return [[-1], [10]];
    }
}
