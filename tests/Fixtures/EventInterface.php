<?php
namespace Riskio\EventSchedulerTest\Fixtures;

use Riskio\EventScheduler\Comparable;
use Riskio\EventScheduler\EventInterface as BaseEvent;

class EventInterface implements BaseEvent
{
    public function equals($compare) : bool
    {
        return $this === $compare;
    }
}
