<?php
namespace Riskio\ScheduleTest\TemporalExpression\Collection;

use DateTime;
use Riskio\Schedule\TemporalExpression\TemporalExpressionInterface;
use Riskio\Schedule\TemporalExpression\Collection\Intersection;

class IntersectionTest extends \PHPUnit_Framework_TestCase
{
    public function getDataProvider()
    {
        return [
            [true, true, true],
            [true, false, false],
            [false, true, false],
            [false, false, false],
        ];
    }

    /**
     * @dataProvider getDataProvider
     */
    public function testIncludesDateAccordingToDataProviderValues($first, $second, $expected)
    {
        $anyDate = new DateTime();

        $temporalExpression = new Intersection();

        $firstExpr = $this->prophesize(TemporalExpressionInterface::class);
        $firstExpr->includes($anyDate)->willReturn($first);
        $temporalExpression->addElement($firstExpr->reveal());

        $secondExpr = $this->prophesize(TemporalExpressionInterface::class);
        $secondExpr->includes($anyDate)->willReturn($second);
        $temporalExpression->addElement($secondExpr->reveal());

        $output = $temporalExpression->includes($anyDate);

        $this->assertSame($expected, $output);
    }
}