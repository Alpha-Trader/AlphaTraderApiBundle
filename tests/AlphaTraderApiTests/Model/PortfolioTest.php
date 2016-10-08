<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 01:02
 */

namespace AlphaTraderApiTests\Model;

use Alphatrader\ApiBundle\Model\Portfolio;

/**
 * Class PortfolioTest
 * @package AlphaTraderApiTests\Model
 */

class PortfolioTest extends \PHPUnit_Framework_TestCase
{
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

    /**
     * @param int $min
     * @param int $max
     * @return mixed
     */
    private function getRandomFloat($min = 1, $max = 50000000)
    {
        return mt_rand($min, $max) + (rand()/mt_getrandmax());
    }
}
