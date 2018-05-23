<?php
namespace Riskio\EventScheduler;

use DateTimeInterface;

interface Occurrable
{
    public function isOccurring(EventInterface $event, DateTimeInterface $date) : bool;
}
