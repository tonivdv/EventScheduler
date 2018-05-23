<?php
namespace Riskio\EventScheduler\TemporalExpression;

use DateTimeInterface;
use Riskio\EventScheduler\ValueObject\Year as YearValueObject;

/**
 * @author Toni Van de Voorde <toni@adlogix.eu>
 */
final class Year implements TemporalExpressionInterface
{
    /**
     * @var YearValueObject
     */
    protected $year;

    /**
     * @param int $year
     */
    public function __construct(int $year)
    {
        $this->year = new YearValueObject($year);
    }

    /**
     * {@inheritdoc}
     */
    public function includes(DateTimeInterface $date) : bool
    {
        return $this->year->equals(YearValueObject::fromDateTime($date));
    }
}
