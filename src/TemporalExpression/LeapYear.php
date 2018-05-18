<?php
namespace Riskio\EventScheduler\TemporalExpression;

use DateTimeInterface;

/**
 * @author Toni Van de Voorde <toni@adlogix.eu>
 */
final class LeapYear implements TemporalExpressionInterface
{
    /**
     * {@inheritdoc}
     */
    public function includes(DateTimeInterface $date) : bool
    {
        return $date->format('L') == 1;
    }
}
