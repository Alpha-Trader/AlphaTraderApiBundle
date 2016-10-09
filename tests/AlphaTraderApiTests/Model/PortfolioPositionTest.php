<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 01:31
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\PortfolioPosition;

/**
 * Class PortfolioPositionTest
 * @package AlphaTraderApiTests\Model
 */

class PortfolioPositionTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testCommittedShares()
    {
        $pp = new PortfolioPosition();
        $this->assertNull($pp->getCommittedShares());

        $shares = mt_rand(20, 5000);
        $pp->setCommittedShares($shares);

        $this->assertTrue(is_int($pp->getCommittedShares()));
        $this->assertEquals($shares, $pp->getCommittedShares());
    }

    public function testCurrentAskPrice()
    {
        $pp = new PortfolioPosition();
        $this->assertNull($pp->getCurrentAskPrice());

        $ask = $this->getRandomFloat(1, 10);
        $pp->setCurrentAskPrice($ask);

        $this->assertTrue(is_float($pp->getCurrentAskPrice()));
        $this->assertEquals($ask, $pp->getCurrentAskPrice());
    }

    public function testCurrentAskSize()
    {
        $pp = new PortfolioPosition();
        $this->assertNull($pp->getCurrentAskSize());

        $currentAskSize = mt_rand(20, 5000);
        $pp->setCurrentAskSize($currentAskSize);

        $this->assertTrue(is_int($pp->getCurrentAskSize()));
        $this->assertEquals($currentAskSize, $pp->getCurrentAskSize());
    }

    public function testCurrentBidPrice()
    {
        $pp = new PortfolioPosition();
        $this->assertNull($pp->getCurrentBidPrice());

        $bid = $this->getRandomFloat(1, 10);
        $pp->setCurrentBidPrice($bid);

        $this->assertTrue(is_float($pp->getCurrentBidPrice()));
        $this->assertEquals($bid, $pp->getCurrentBidPrice());
    }

    public function testCurrentBidSize()
    {
        $pp = new PortfolioPosition();
        $this->assertNull($pp->getCurrentBidSize());

        $currentBidSize = mt_rand(20, 5000);
        $pp->setCurrentBidSize($currentBidSize);

        $this->assertTrue(is_int($pp->getCurrentBidSize()));
        $this->assertEquals($currentBidSize, $pp->getCurrentBidSize());
    }

    public function testLastPrice()
    {
        $pp = new PortfolioPosition();
        $this->assertNull($pp->getLastPrice());

        $lastPrice = $this->createMock("Alphatrader\ApiBundle\Model\SecurityPrice");
        $pp->setLastPrice($lastPrice);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\SecurityPrice", $pp->getLastPrice());
    }

    public function testNumberOfShares()
    {
        $pp = new PortfolioPosition();
        $this->assertNull($pp->getNumberOfShares());

        $shares = mt_rand(50000, 5000000);
        $pp->setNumberOfShares($shares);

        $this->assertTrue(is_int($pp->getNumberOfShares()));
        $this->assertEquals($shares, $pp->getNumberOfShares());
    }

    public function testSecurityIdentifier()
    {
        $pp = new PortfolioPosition();
        $this->assertNull($pp->getSecurityIdentifier());

        $secIdent = $this->getRandomString(6);
        $pp->setSecurityIdentifier($secIdent);

        $this->assertTrue(is_string($pp->getSecurityIdentifier()));
        $this->assertEquals($secIdent, $pp->getSecurityIdentifier());
    }
}
