<?php
namespace Riskio\EventScheduler;

use DateTimeInterface;
use Riskio\EventScheduler\TemporalExpression\TemporalExpressionInterface;

class SchedulableEvent implements Occurrable
{
    /**
     * @var EventInterface
     */
    protected $event;

    /**
     * @var TemporalExpressionInterface
     */
    protected $temporalExpression;

    public function __construct(EventInterface $event, TemporalExpressionInterface $temporalExpression)
    {
        $this->event = $event;
        $this->temporalExpression = $temporalExpression;
    }

    public function event() : EventInterface
    {
        return $this->event;
    }

    public function temporalExpression() : TemporalExpressionInterface
    {
        return $this->temporalExpression;
    }

    public function isOccurring(EventInterface $event, DateTimeInterface $date) : bool
    {
        return $this->event->equals($event) && $this->temporalExpression->includes($date);
    }
}
