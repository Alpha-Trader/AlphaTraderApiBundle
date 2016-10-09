<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 01:53
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\PriceSpread;

/**
 * Class PriceSpreadTest
 * @package AlphaTraderApiTests\Model
 */

class PriceSpreadTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testAskPrice()
    {
        $priceSpread = new PriceSpread();
        $this->assertNull($priceSpread->getAskPrice());

        $askPrice = $this->getRandomFloat();
        $priceSpread->setAskPrice($askPrice);

        $this->assertTrue(is_float($priceSpread->getAskPrice()));
        $this->assertEquals($askPrice, $priceSpread->getAskPrice());
    }

    public function testBidPrice()
    {
        $priceSpread = new PriceSpread();
        $this->assertNull($priceSpread->getBidPrice());

        $bidPrice = $this->getRandomFloat();
        $priceSpread->setBidPrice($bidPrice);

        $this->assertTrue(is_float($priceSpread->getBidPrice()));
        $this->assertEquals($bidPrice, $priceSpread->getBidPrice());
    }

    public function testAskSize()
    {
        $priceSpread = new PriceSpread();
        $this->assertNull($priceSpread->getAskSize());

        $askSize = mt_rand(100, 1000);
        $priceSpread->setAskSize($askSize);

        $this->assertTrue(is_int($priceSpread->getAskSize()));
        $this->assertEquals($askSize, $priceSpread->getAskSize());
    }

    public function testBidSize()
    {
        $priceSpread = new PriceSpread();
        $this->assertNull($priceSpread->getBidSize());

        $bidSize = mt_rand(100, 1000);
        $priceSpread->setBidSize($bidSize);

        $this->assertTrue(is_int($priceSpread->getBidSize()));
        $this->assertEquals($bidSize, $priceSpread->getBidSize());
    }

    public function testLastPrice()
    {
        $priceSpread = new PriceSpread();
        $this->assertNull($priceSpread->getLastPrice());

        $lastPrice = $this->createMock("Alphatrader\ApiBundle\Model\SecurityPrice");
        $priceSpread->setLastPrice($lastPrice);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\SecurityPrice", $priceSpread->getLastPrice());
    }

    public function testMaxBidPrice()
    {
        $priceSpread = new PriceSpread();
        $this->assertNull($priceSpread->getMaxBidPrice());

        $max = $this->getRandomFloat();
        $priceSpread->setMaxBidPrice($max);

        $this->assertTrue(is_float($priceSpread->getMaxBidPrice()));
        $this->assertEquals($max, $priceSpread->getMaxBidPrice());
    }

    public function testMinAskPrice()
    {
        $priceSpread = new PriceSpread();
        $this->assertNull($priceSpread->getMinAskPrice());

        $min = $this->getRandomFloat();
        $priceSpread->setMinAskPrice($min);

        $this->assertTrue(is_float($priceSpread->getMinAskPrice()));
        $this->assertEquals($min, $priceSpread->getMinAskPrice());
    }

    public function testSpreadAbs()
    {
        $priceSpread = new PriceSpread();
        $this->assertNull($priceSpread->getSpreadAbs());

        $spread = $this->getRandomFloat();
        $priceSpread->setSpreadAbs($spread);

        $this->assertTrue(is_float($priceSpread->getSpreadAbs()));
        $this->assertEquals($spread, $priceSpread->getSpreadAbs());
    }

    public function testSpreadPercent()
    {
        $priceSpread = new PriceSpread();
        $this->assertNull($priceSpread->getSpreadPercent());

        $spread = $this->getRandomFloat(0,1);
        $priceSpread->setSpreadPercent($spread);

        $this->assertTrue(is_float($priceSpread->getSpreadPercent()));
        $this->assertEquals($spread, $priceSpread->getSpreadPercent());
    }
}
