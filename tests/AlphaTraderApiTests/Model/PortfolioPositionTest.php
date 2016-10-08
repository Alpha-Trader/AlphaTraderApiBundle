<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 01:31
 */

namespace AlphaTraderApiTests\Model;

use Alphatrader\ApiBundle\Model\PortfolioPosition;

/**
 * Class PortfolioPositionTest
 * @package AlphaTraderApiTests\Model
 */

class PortfolioPositionTest extends \PHPUnit_Framework_TestCase
{
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
        $pp->setCommittedShares($ask);

        $this->assertTrue(is_int($pp->getCurrentAskPrice()));
        $this->assertEquals($ask, $pp->getCurrentAskPrice());
    }

    public function testCurrentAskSize()
    {
        $pp = new PortfolioPosition();
        $this->assertNull($pp->getCurrentAskSize());

        $currentAskSize = mt_rand(20, 5000);
        $pp->setCommittedShares($currentAskSize);

        $this->assertTrue(is_int($pp->getCurrentAskSize()));
        $this->assertEquals($currentAskSize, $pp->getCurrentAskSize());
    }

    public function testCurrentBidPrice()
    {
        $pp = new PortfolioPosition();
        $this->assertNull($pp->getCurrentBidPrice());

        $bid = $this->getRandomFloat(1, 10);
        $pp->setCommittedShares($bid);

        $this->assertTrue(is_int($pp->getCurrentBidPrice()));
        $this->assertEquals($bid, $pp->getCurrentBidPrice());
    }

    public function testCurrentBidSize()
    {
        $pp = new PortfolioPosition();
        $this->assertNull($pp->getCurrentBidSize());

        $currentBidSize = mt_rand(20, 5000);
        $pp->setCommittedShares($currentBidSize);

        $this->assertTrue(is_int($pp->getCurrentAskSize()));
        $this->assertEquals($currentBidSize, $pp->getCurrentAskSize());
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

        $shares = mt_rand(50000);
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

    /**
     * @param int $min
     * @param int $max
     * @return mixed
     */
    private function getRandomFloat($min = 1, $max = 50000000)
    {
        return mt_rand($min, $max) + (rand()/mt_getrandmax());
    }

    /*
    * @param int $length
    * @return string
    */
    private function getRandomString($length = 6)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
}
