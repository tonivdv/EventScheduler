<?php
namespace Riskio\EventScheduler\TemporalExpression;

use DateTimeInterface;
use Riskio\EventScheduler\ValueObject\MonthDay;

/**
 * @author Toni Van de Voorde <toni@adlogix.eu>
 */
final class DayInMonth implements TemporalExpressionInterface
{
    /**
     * @var MonthDay
     */
    protected $day;

    /**
     * @param int $day
     */
    public function __construct(int $day)
    {
        $this->day = new MonthDay($day);
    }

    /**
     * {@inheritdoc}
     */
    public function includes(DateTimeInterface $date) : bool
    {
        return $this->day->equals(MonthDay::fromDateTime($date));
    }
}
