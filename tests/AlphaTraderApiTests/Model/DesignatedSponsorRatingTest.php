<?php
/**
 * User: ljbergmann
 * Date: 30.09.16 13:37
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\DesignatedSponsorRating;

/**
 * Class DesignatedSponsorRatingTest
 * @package AlphaTraderApiTests\Model
 */

class DesignatedSponsorRatingTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testSalery()
    {
        $dsr = new DesignatedSponsorRating();
        $this->assertNull($dsr->getSalary());

        $salary = $this->getRandomFloat();
        $dsr->setSalary($salary);

        $this->assertTrue(is_float($dsr->getSalary()));
        $this->assertEquals($salary, $dsr->getSalary());
    }

    public function testValue()
    {
        $dsr = new DesignatedSponsorRating();
        $this->assertNull($dsr->getValue());
        
        $value = $this->getRandomString(1);
        $dsr->setValue($value);
        
        $this->assertTrue(is_string($dsr->getValue()));
        $this->assertEquals($value, $dsr->getValue());
    }
}
