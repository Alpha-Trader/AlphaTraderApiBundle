<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 03:21
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\ShareholderStake;

/**
 * Class SecuritySponsorshipTest
 * @package Tests\Model
 */

class ShareholderStakeTest extends \PHPUnit_Framework_TestCase
{
    public function testAveragePrice()
    {
        $secSpo = new ShareholderStake();
        $this->assertNull($secSpo->getAveragePrice());

        $secSpo->setAveragePrice(2.1);

        $this->assertTrue(is_float($secSpo->getAveragePrice()));
    }

    public function testNumberOfShares()
    {
        $secSpo = new ShareholderStake();
        $this->assertNull($secSpo->getNumberOfShares());

        $secSpo->setNumberOfShares(1);

        $this->assertTrue(is_int($secSpo->getNumberOfShares()));
        $this->assertEquals(1, $secSpo->getNumberOfShares());
    }

    public function testStakeInPercent()
    {
        $secSpo = new ShareholderStake();
        $this->assertNull($secSpo->getStakeInPercent());

        $secSpo->setStakeInPercent(25);

        $this->assertEquals(25, $secSpo->getStakeInPercent());
    }
}
