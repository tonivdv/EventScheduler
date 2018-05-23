<?php

namespace Riskio\EventSchedulerTest\TemporalExpression;

use PHPUnit\Framework\TestCase;
use Riskio\EventScheduler\TemporalExpression\EachDay;

class EachDayTest extends TestCase
{
    /**
     * @test
     */
    public function includes_GivenAnyDate_ShouldReturnTrue()
    {
        /** @var \DateTimeInterface $date */
        $date = $this->createMock(\DateTime::class);
        $expr = new EachDay();

        $isIncluded = $expr->includes($date);

        $this->assertThat($isIncluded, $this->isTrue());
    }
}
