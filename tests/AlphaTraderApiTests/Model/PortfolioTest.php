<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 01:02
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\Portfolio;

/**
 * Class PortfolioTest
 * @package AlphaTraderApiTests\Model
 */

class PortfolioTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testCash()
    {
        $portfolio = new Portfolio();
        $this->assertNull($portfolio->getCash());

        $cash = $this->getRandomFloat();
        $portfolio->setCash($cash);

        $this->assertTrue(is_float($portfolio->getCash()));
        $this->assertEquals($cash, $portfolio->getCash());
    }

    public function testCommittedCash()
    {
        $portfolio = new Portfolio();
        $this->assertNull($portfolio->getCommittedCash());

        $cCash = $this->getRandomFloat();
        $portfolio->setCommittedCash($cCash);

        $this->assertTrue(is_float($portfolio->getCommittedCash()));
        $this->assertEquals($cCash, $portfolio->getCommittedCash());
    }

    public function testPositions()
    {
        $portfolio = new Portfolio();
        $this->assertNull($portfolio->getPositions());

        $positions = $this->createMock('\Doctrine\Common\Collections\ArrayCollection');
        $portfolio->setPositions($positions);

        $this->assertInstanceOf('\Doctrine\Common\Collections\ArrayCollection', $portfolio->getPositions());
    }
}
