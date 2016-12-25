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

    public function testGetPriceSpreadsV2()
    {
        $expected = "{\"content\":[{\"listing\":{\"startDate\":1469950288064,\"securityIdentifier\":\"STS63548\",\"endDate\":null,\"name\":\"Solid Profit AG\",\"type\":\"STOCK\"},\"askPrice\":null,\"askSize\":null,\"spreadPercent\":null,\"bidSize\":350,\"lastPrice\":{\"date\":1478815212024,\"value\":5.01},\"spreadAbs\":null,\"bidPrice\":6,\"date\":1481281721233},{\"listing\":{\"startDate\":1469950663794,\"securityIdentifier\":\"STA2FE8F\",\"endDate\":null,\"name\":\"Alpha Bank\",\"type\":\"STOCK\"},\"askPrice\":null,\"askSize\":null,\"spreadPercent\":null,\"bidSize\":null,\"lastPrice\":{\"date\":1469950663846,\"value\":2000},\"spreadAbs\":null,\"bidPrice\":null,\"date\":1481281721300},{\"listing\":{\"startDate\":1469950849410,\"securityIdentifier\":\"STS352B9\",\"endDate\":null,\"name\":\"Sky Venture Capital AG\",\"type\":\"STOCK\"},\"askPrice\":null,\"askSize\":null,\"spreadPercent\":null,\"bidSize\":36502,\"lastPrice\":{\"date\":1478339746235,\"value\":3.6},\"spreadAbs\":null,\"bidPrice\":3.6,\"date\":1481281721317},{\"listing\":{\"startDate\":1469951654377,\"securityIdentifier\":\"STBB1E93\",\"endDate\":null,\"name\":\"BlackCrop\",\"type\":\"STOCK\"},\"askPrice\":null,\"askSize\":null,\"spreadPercent\":null,\"bidSize\":null,\"lastPrice\":{\"date\":1479145076402,\"value\":145.64},\"spreadAbs\":null,\"bidPrice\":null,\"date\":1481281721332},{\"listing\":{\"startDate\":1469951698361,\"securityIdentifier\":\"STK0F513\",\"endDate\":null,\"name\":\"Katholische Kirche AG\",\"type\":\"STOCK\"},\"askPrice\":null,\"askSize\":null,\"spreadPercent\":null,\"bidSize\":49514,\"lastPrice\":{\"date\":1478339746386,\"value\":20},\"spreadAbs\":null,\"bidPrice\":25,\"date\":1481281721354},{\"listing\":{\"startDate\":1469952355330,\"securityIdentifier\":\"STDFE5D9\",\"endDate\":null,\"name\":\"Dreambox\",\"type\":\"STOCK\"},\"askPrice\":0.65,\"askSize\":4,\"spreadPercent\":null,\"bidSize\":null,\"lastPrice\":{\"date\":1479202268432,\"value\":0.54},\"spreadAbs\":null,\"bidPrice\":null,\"date\":1481281721377},{\"listing\":{\"startDate\":1469953110796,\"securityIdentifier\":\"STDC56ED\",\"endDate\":null,\"name\":\"D.A.Graham & Morgan PLC \",\"type\":\"STOCK\"},\"askPrice\":131.02,\"askSize\":151,\"spreadPercent\":null,\"bidSize\":null,\"lastPrice\":{\"date\":1479290938007,\"value\":131.02},\"spreadAbs\":null,\"bidPrice\":null,\"date\":1481281721392},{\"listing\":{\"startDate\":1469953578327,\"securityIdentifier\":\"STT3C543\",\"endDate\":null,\"name\":\"Tr0n Investment AG\",\"type\":\"STOCK\"},\"askPrice\":null,\"askSize\":null,\"spreadPercent\":null,\"bidSize\":77687,\"lastPrice\":{\"date\":1479151982075,\"value\":353.82},\"spreadAbs\":null,\"bidPrice\":353.82,\"date\":1481281721415},{\"listing\":{\"startDate\":1469954365732,\"securityIdentifier\":\"STTEF91D\",\"endDate\":null,\"name\":\"Trololski AG\",\"type\":\"STOCK\"},\"askPrice\":null,\"askSize\":null,\"spreadPercent\":null,\"bidSize\":null,\"lastPrice\":{\"date\":1478373421031,\"value\":0.05},\"spreadAbs\":null,\"bidPrice\":null,\"date\":1481281721437},{\"listing\":{\"startDate\":1469955616428,\"securityIdentifier\":\"STA39DE4\",\"endDate\":null,\"name\":\"A1GPD7\",\"type\":\"STOCK\"},\"askPrice\":755.03,\"askSize\":165,\"spreadPercent\":null,\"bidSize\":null,\"lastPrice\":{\"date\":1479142328685,\"value\":629.19},\"spreadAbs\":null,\"bidPrice\":null,\"date\":1481281721450}],\"last\":false,\"totalPages\":92,\"totalElements\":919,\"first\":true,\"sort\":[{\"direction\":\"ASC\",\"property\":\"startDate\",\"ignoreCase\":false,\"nullHandling\":\"NATIVE\",\"ascending\":true}],\"numberOfElements\":10,\"size\":10,\"number\":0}";
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\PriceSpreadController');
        $request->method('getPriceSpreadV2')->willReturn($expected);

        $priceSpreadController = new PriceSpreadController($this->config);
        $priceSpreadController->setClient($this->getClient($expected));

        $value = $priceSpreadController->getPriceSpreadV2(1,1,1);
        var_dump($value->getContent()[0]->getDate());
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\PriceSpreadPage', $value);
        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\PriceSpreadListing', $value->getContent());

    }
}
