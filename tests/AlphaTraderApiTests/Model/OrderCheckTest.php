<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 00:45
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\OrderCheck;

/**
 * Class OrderCheckTest
 * @package AlphaTraderApiTests\Model
 */

class OrderCheckTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testNumberOfShares()
    {
        $OrderCheck = new OrderCheck();
        $this->assertNull($OrderCheck->getNumberOfShares());

        $shares = mt_rand(50, 5000);
        $OrderCheck->setNumberOfShares($shares);

        $this->assertTrue(is_int($OrderCheck->getNumberOfShares()));
        $this->assertEquals($shares, $OrderCheck->getNumberOfShares());
    }

    public function testSpread()
    {
        $OrderCheck = new OrderCheck();
        $this->assertNull($OrderCheck->getSpread());

        $spread = $this->createMock("Alphatrader\ApiBundle\Model\PriceSpread");
        $OrderCheck->setSpread($spread);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\PriceSpread", $OrderCheck->getSpread());
    }

    public function testUncommittedCash()
    {
        $OrderCheck = new OrderCheck();
        $this->assertNull($OrderCheck->getUncommittedCash());

        $cash = $this->getRandomFloat();
        $OrderCheck->setUncommittedCash($cash);

        $this->assertTrue(is_float($OrderCheck->getUncommittedCash()));
        $this->assertEquals($cash, $OrderCheck->getUncommittedCash());
    }

    public function testVolume()
    {
        $OrderCheck = new OrderCheck();
        $this->assertNull($OrderCheck->getVolume());

        $volume = $this->getRandomFloat();
        $OrderCheck->setVolume($volume);

        $this->assertTrue(is_float($OrderCheck->getVolume()));
        $this->assertEquals($volume, $OrderCheck->getVolume());
    }
}
