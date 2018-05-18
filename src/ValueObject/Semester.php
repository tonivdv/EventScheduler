<?php

namespace Riskio\EventScheduler\ValueObject;

use DateTime;
use DateTimeInterface;
use Webmozart\Assert\Assert;

/**
 * @author Toni Van de Voorde <toni@adlogix.eu>
 */
final class Semester
{
    /**
     * @var int
     */
    private $value;

    /**
     * @param int $value
     */
    private function __construct(int $value)
    {
        Assert::range($value, 1, 2);
        $this->value = $value;
    }

    /**
     * @return Semester
     */
    public static function first(): self
    {
        return new self(1);
    }

    /**
     * @return Semester
     */
    public static function second(): self
    {
        return new self(2);
    }

    /**
     * @return Semester
     */
    public static function now(): self
    {
        return self::fromDateTime(new DateTime('now'));
    }

    /**
     * @param DateTimeInterface $dateTime
     * @return Semester
     */
    public static function fromDateTime(DateTimeInterface $dateTime): self
    {
        $semester = ceil($dateTime->format('n') / 6);

        return new self($semester);
    }

    /**
     * @param int $value
     * @return Semester
     */
    public static function fromValue(int $value)
    {
        return new self($value);
    }
}
