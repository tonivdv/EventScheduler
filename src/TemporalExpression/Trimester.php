<?php

namespace Riskio\EventScheduler\TemporalExpression;

use DateTimeInterface;
use Riskio\EventScheduler\ValueObject\Trimester as TrimesterValueObject;

/**
 * @author Toni Van de Voorde <toni@adlogix.eu>
 */
final class Trimester implements TemporalExpressionInterface
{
    /**
     * @var TrimesterValueObject
     */
    protected $trimester;

    /**
     * @param TrimesterValueObject $trimester
     */
    public function __construct(TrimesterValueObject $trimester)
    {
        $this->trimester = $trimester;
    }

    /**
     * @return Trimester
     */
    public static function first(): self
    {
        return new self(TrimesterValueObject::first());
    }

    /**
     * @return Trimester
     */
    public static function second(): self
    {
        return new self(TrimesterValueObject::second());
    }

    /**
     * @return Trimester
     */
    public static function third(): self
    {
        return new self(TrimesterValueObject::third());
    }

    /**
     * @return Trimester
     */
    public static function fourth(): self
    {
        return new self(TrimesterValueObject::fourth());
    }

    /**
     * {@inheritdoc}
     */
    public function includes(DateTimeInterface $date): bool
    {
        return $this->trimester->equals(TrimesterValueObject::fromNDateTime($date));
    }
}
