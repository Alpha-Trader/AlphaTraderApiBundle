<?php
/**
 * User: ljbergmann
 * Date: 11.11.16 22:02
 */

namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\PriceSpreadController;

/**
 * Class PriceSpreadControllerTest
 * @package Tests\Methods
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class PriceSpreadControllerTest extends BaseTestCase
{
    public function testGetPriceSpreads()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\PriceSpreadController');
        $request->method('getPriceSpreads')->willReturn($expected);

        $priceSpreadController = new PriceSpreadController($this->config);
        $priceSpreadController->setClient($this->getClient($expected));

        $value = $priceSpreadController->getPriceSpreads();

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Error', $value);
    }

    public function testGetPriceSpread()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\PriceSpreadController');
        $request->method('getPriceSpreads')->willReturn($expected);

        $priceSpreadController = new PriceSpreadController($this->config);
        $priceSpreadController->setClient($this->getClient($expected));
        try {
                $value = $priceSpreadController->getPriceSpread('ST34566');
        } catch (\RuntimeException $value) {
            $this->assertInstanceOf('Alphatrader\ApiBundle\Api\Exception\AlphaTraderApiException', $value);
        }
    }
}
