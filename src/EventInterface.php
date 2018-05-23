<?php
namespace Riskio\EventScheduler;

interface EventInterface
{
    /**
     * @param $compare
     * @return bool
     */
    public function equals($compare) : bool;
}
