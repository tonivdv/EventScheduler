<?php
namespace Riskio\EventScheduler\TemporalExpression;

use DateTimeInterface;
use Riskio\EventScheduler\ValueObject\Week;

/**
 * @author Toni Van de Voorde <toni@adlogix.eu>
 */
final class WeekInYear implements TemporalExpressionInterface
{
    /**
     * @var Week
     */
    protected $week;

    /**
     * @param int $week
     */
    public function __construct(int $week)
    {
        $this->week = new Week($week);
    }

    /**
     * {@inheritdoc}
     */
    public function includes(DateTimeInterface $date) : bool
    {
        return $this->week->equals(Week::fromDateTime($date));
    }
}
