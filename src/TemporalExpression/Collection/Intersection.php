<?php

namespace Riskio\EventScheduler\TemporalExpression\Collection;

use DateTimeInterface;

/**
 * @author Toni Van de Voorde <toni@adlogix.eu>
 */
final class Intersection extends AbstractCollection
{
    /**
     * {@inheritdoc}
     */
    public function includes(DateTimeInterface $date): bool
    {
        foreach ($this->elements as $element) {
            if (!$element->includes($date)) {
                return false;
            }
        }

        return true;
    }
}
