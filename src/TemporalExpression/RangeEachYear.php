<?php

namespace Riskio\EventScheduler\TemporalExpression;

use DateTimeInterface;
use Riskio\EventScheduler\ValueObject\Month;
use Riskio\EventScheduler\ValueObject\MonthDay;

class RangeEachYear implements TemporalExpressionInterface
{
    /**
     * @var Month
     */
    protected $startMonth;

    /**
     * @var Month
     */
    protected $endMonth;

    /**
     * @var MonthDay
     */
    protected $startDay;

    /**
     * @var MonthDay
     */
    protected $endDay;

    /**
     * @param Month $startMonth
     * @param Month $endMonth
     * @param null  $startDay
     * @param null  $endDay
     */
    public function __construct(Month $startMonth, Month $endMonth, $startDay = null, $endDay = null)
    {
        $this->startMonth = $startMonth;
        $this->endMonth = $endMonth;

        if (null !== $startDay) {
            $this->startDay = MonthDay::fromNative($startDay);
        }
        if (null !== $endDay) {
            $this->endDay = MonthDay::fromNative($endDay);
        }
    }

    public function includes(DateTimeInterface $date): bool
    {
        return $this->monthsInclude($date)
            || $this->startMonthIncludes($date)
            || $this->endMonthIncludes($date);
    }

    private function monthsInclude(DateTimeInterface $date): bool
    {
        $month = Month::fromDateTime($date);
        $ordinalMonth = $month->number();

        $ordinalStartMonth = $this->startMonth->number();
        $ordinalEndMonth = $this->endMonth->number();

        if ($ordinalStartMonth <= $ordinalEndMonth) {
            return ($ordinalMonth > $ordinalStartMonth && $ordinalMonth < $ordinalEndMonth);
        } else {
            return ($ordinalMonth > $ordinalStartMonth || $ordinalMonth < $ordinalEndMonth);
        }
    }

    private function startMonthIncludes(DateTimeInterface $date): bool
    {
        $month = Month::fromDateTime($date);

        if (!$this->startMonth->equals($month)) {
            return false;
        }

        if (!$this->startDay) {
            return true;
        }

        $day = MonthDay::fromNativeDateTime($date);

        return $day->toNative() >= $this->startDay->toNative();
    }

    private function endMonthIncludes(DateTimeInterface $date): bool
    {
        $month = Month::fromDateTime($date);

        if (!$this->endMonth->equals($month)) {
            return false;
        }

        if (!$this->endDay) {
            return true;
        }

        $day = MonthDay::fromNativeDateTime($date);

        return $day->toNative() <= $this->endDay->toNative();
    }
}
