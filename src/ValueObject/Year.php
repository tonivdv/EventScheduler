<?php

namespace Riskio\EventScheduler\ValueObject;

use DateTimeInterface;

/**
 * @author Toni Van de Voorde <toni@adlogix.eu>
 */
final class Year
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
     * @param DateTimeInterface $dateTime
     * @return Year
     */
    public static function fromDateTime(DateTimeInterface $dateTime): self
    {
        return new self($dateTime->format('Y'));
    }
}
