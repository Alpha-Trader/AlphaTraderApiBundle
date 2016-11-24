<?php
/**
 * User: ljbergmann
 * Date: 11.11.16 22:22
 */

namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\StatisticsController;

/**
 * Class StatisticsControllerTest
 * @package Tests\Methods
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class StatisticsControllerTest extends BaseTestCase
{
    public function testGetMarketStatisticsAsObject()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\StatisticsController');
        $request->method('getMarketStatisticsAsObject')->willReturn($expected);

        $statisticsController = new StatisticsController($this->config);
        $statisticsController->setClient($this->getClient($expected));

        $value = $statisticsController->getMarketStatisticsAsObject();

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Error', $value);
    }

    public function testGetMarketStatisticsAsArray()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\StatisticsController');
        $request->method('getMarketStatisticsAsArray')->willReturn($expected);

        $statisticsController = new StatisticsController($this->config);
        $statisticsController->setClient($this->getClient($expected));

        $value = $statisticsController->getMarketStatisticsAsArray();

        $this->assertTrue(is_array($value));
    }
}
