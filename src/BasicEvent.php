<?php
/*
 * This file is part of the Adlogix package.
 *
 * (c) Allan Segebarth <allan@adlogix.eu>
 * (c) Jean-Jacques Courtens <jjc@adlogix.eu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Riskio\EventScheduler;

use Webmozart\Assert\Assert;

/**
 * @author Toni Van de Voorde <toni@adlogix.eu>
 */
final class BasicEvent implements EventInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param BasicEvent $compare
     * @return bool
     */
    public function equals($compare): bool
    {
        Assert::isInstanceOf($compare, BasicEvent::class);
        return $this->name === $compare->__toString();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }
}