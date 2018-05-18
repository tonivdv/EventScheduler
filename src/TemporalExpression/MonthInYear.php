<?php

namespace Riskio\EventScheduler\TemporalExpression;

use DateTimeInterface;
use Riskio\EventScheduler\ValueObject\Month;

/**
 * @author Toni Van de Voorde <toni@adlogix.eu>
 */
final class MonthInYear implements TemporalExpressionInterface
{
    /**
     * @var Month
     */
    protected $month;

    /**
     * @param Month $month
     */
    private function __construct(Month $month)
    {
        $this->month = $month;
    }

    /**
     * {@inheritdoc}
     */
    public function includes(DateTimeInterface $date): bool
    {
        return $this->month->equals(Month::fromDateTime($date));
    }

    public static function january(): self
    {
        return new self(Month::january());
    }

    public static function february(): self
    {
        return new self(Month::february());
    }

    public static function march(): self
    {
        return new self(Month::march());
    }

    public static function april(): self
    {
        return new self(Month::april());
    }

    public static function may(): self
    {
        return new self(Month::may());
    }

    public static function june(): self
    {
        return new self(Month::june());
    }

    public static function july(): self
    {
        return new self(Month::july());
    }

    public static function august(): self
    {
        return new self(Month::august());
    }

    public static function september(): self
    {
        return new self(Month::september());
    }

    public static function october(): self
    {
        return new self(Month::october());
    }

    public static function november(): self
    {
        return new self(Month::november());
    }

    public static function december(): self
    {
        return new self(Month::december());
    }
}
