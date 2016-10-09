<?php
/**
 * User: ljbergmann
 * Date: 30.09.16 13:43
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\EmploymentAgreement;

/**
 * Class EmploymentAgreementTest
 * @package AlphaTraderApiTests\Model
 */

class EmploymentAgreementTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testId()
    {
        $ea = new EmploymentAgreement();
        $this->assertNull($ea->getId());
        
        $id = uniqid();
        
        $ea->setId($id);
        
        $this->assertTrue(is_string($ea->getId()));
        $this->assertEquals($id, $ea->getId());
    }

    public function testDailyWage()
    {
        $ea = new EmploymentAgreement();
        $this->assertNull($ea->getDailyWage());

        $wage = $this->getRandomFloat();
        $ea->setDailyWage($wage);
        $this->assertTrue(is_float($ea->getDailyWage()));
        $this->assertEquals($wage, $ea->getDailyWage());
    }
}
