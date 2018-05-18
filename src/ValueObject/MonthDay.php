<?php

namespace Riskio\EventScheduler\ValueObject;

use DateTimeInterface;
use Webmozart\Assert\Assert;

/**
 * @author Toni Van de Voorde <toni@adlogix.eu>
 */
final class MonthDay
{
    /**
     * @var int
     */
    private $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        Assert::range($value, 1, 31);
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }

    /**
     * @param MonthDay $month
     * @return bool
     */
    public function equals(MonthDay $month): bool
    {
        return $this->value === $month->value();
    }

    /**
     * @param DateTimeInterface $dateTime
     * @return MonthDay
     */
    public static function fromDateTime(DateTimeInterface $dateTime): self
    {
        return new self($dateTime->format('j'));
    }
}
