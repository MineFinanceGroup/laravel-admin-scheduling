<?php

namespace Encore\Admin\Scheduling\Tests\Compatibility;

use Encore\Admin\Scheduling\CronSchedule;
use PHPUnit\Framework\TestCase;

class CronScheduleTest extends TestCase
{
    public function testHourlyExpressionProducesReadableTextDistinctFromEveryMinute(): void
    {
        $schedule = CronSchedule::fromCronString('0 * * * *');
        $this->assertNotSame('', $schedule->asNaturalLanguage());
        $this->assertStringContainsString('hour', strtolower($schedule->asNaturalLanguage()));
        $this->assertNotSame(CronSchedule::fromCronString('* * * * *')->asNaturalLanguage(), $schedule->asNaturalLanguage());
    }

    public function testInvalidExpressionThrowsException(): void
    {
        $this->expectException(\Exception::class);
        CronSchedule::fromCronString('invalid');
    }
}
