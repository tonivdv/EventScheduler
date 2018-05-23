<?php
namespace Riskio\EventSchedulerTest\TemporalExpression;

use DateTime;
use PHPUnit\Framework\TestCase;
use Riskio\EventScheduler\TemporalExpression\DayInWeek;
use Riskio\EventScheduler\ValueObject\WeekDay;

class DayInWeekTest extends TestCase
{
    /**
     * @test
     */
    public function includes_GivenDateAtSameWeekDay_ShouldReturnTrue()
    {
        $date = new DateTime('2015-04-12');
        $expr = DayInWeek::sunday();

        $isIncluded = $expr->includes($date);

        $this->assertThat($isIncluded, $this->isTrue());
    }

    /**
     * @test
     */
    public function includes_GivenDateAtDifferentWeekDay_ShouldReturnFalse()
    {
        $date = new DateTime('2015-04-12');
        $expr = DayInWeek::friday();

        $isIncluded = $expr->includes($date);

        $this->assertThat($isIncluded, $this->isFalse());
    }
}
