<?php
namespace Riskio\EventScheduler\TemporalExpression;

use DateTimeInterface;

/**
 * @author Toni Van de Voorde <toni@adlogix.eu>
 */
final class EachDay implements TemporalExpressionInterface
{
    /**
     * {@inheritdoc}
     */
    public function includes(DateTimeInterface $date) : bool
    {
        return true;
    }
}
