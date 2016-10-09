<?php
/**
 * User: ljbergmann
 * Date: 08.10.16 23:02
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\MainInterestRate;

/**
 * Class MainInterestRateTest
 * @package AlphaTraderApiTests\Model
 */

class MainInterestRateTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testId()
    {
        $mainInterestRate = new MainInterestRate();
        $this->assertNull($mainInterestRate->getId());

        $uid = uniqid();
        $mainInterestRate->setId($uid);

        $this->assertTrue(is_string($mainInterestRate->getId()));
        $this->assertEquals($uid, $mainInterestRate->getId());
    }

    public function testGetValue()
    {
        $mainInterestRate = new MainInterestRate();
        $this->assertNull($mainInterestRate->getValue());

        $value = $this->getRandomFloat(0, 1);
        $mainInterestRate->setValue($value);

        $this->assertTrue(is_float($mainInterestRate->getValue()));
        $this->assertEquals($value, $mainInterestRate->getValue());
    }
}
