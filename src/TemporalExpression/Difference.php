<?php
namespace Riskio\Schedule\TemporalExpression;

use DateTime;

class Difference implements TemporalExpressionInterface
{
    /**
     * @var TemporalExpressionInterface
     */
    protected $included;

    /**
     * @var TemporalExpressionInterface
     */
    protected $excluded;

    /**
     * @param TemporalExpressionInterface $included
     * @param TemporalExpressionInterface $excluded
     */
    public function __construct(
        TemporalExpressionInterface $included,
        TemporalExpressionInterface $excluded
    ) {
        $this->included = $included;
        $this->excluded = $excluded;
    }

    /**
     * @param  DateTime $date
     * @return bool
     */
    public function includes(DateTime $date)
    {
        return $this->included->includes($date) && !$this->excluded->includes($date);
    }
}