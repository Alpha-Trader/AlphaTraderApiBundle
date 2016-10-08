<?php
/**
 * User: ljbergmann
 * Date: 30.09.16 13:43
 */

namespace AlphaTraderApiTests\Model;

use Alphatrader\ApiBundle\Model\EmploymentAgreement;

/**
 * Class EmploymentAgreementTest
 * @package AlphaTraderApiTests\Model
 */

class EmploymentAgreementTest extends \PHPUnit_Framework_TestCase
{
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
    * @param $length
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
