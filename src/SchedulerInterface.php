<?php
namespace Riskio\EventScheduler;

use DateInterval;
use DateTimeImmutable;
use DateTimeInterface;
use Riskio\EventScheduler\DateRange\DateRange;
use Riskio\EventScheduler\TemporalExpression\TemporalExpressionInterface;
use Traversable;

interface SchedulerInterface extends Occurrable
{
    public static function create(
        DateInterval $interval = null,
        DateRange $dateRange = null
    ) : self;

    public function schedule(
        EventInterface $event,
        TemporalExpressionInterface $temporalExpression
    ) : SchedulableEvent;

    public function unschedule(SchedulableEvent $schedulableEvent);

    public function isScheduled(EventInterface $event) : bool;

    public function eventsForDate(DateTimeInterface $date) : Traversable;

    public function dates(EventInterface $event, DateRange $range) : Traversable;

    public function nextOccurrence(
        EventInterface $event,
        DateTimeInterface $start,
        DateTimeInterface $end = null
    ) : DateTimeImmutable;

    public function previousOccurrence(
        EventInterface $event,
        DateTimeInterface $end,
        DateTimeInterface $start = null
    ) : DateTimeImmutable;

    public function dateRange() : DateRange;

    public function changeDateRange(DateRange $range);
}
