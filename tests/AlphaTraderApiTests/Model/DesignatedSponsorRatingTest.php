<?php
/**
 * User: ljbergmann
 * Date: 30.09.16 13:37
 */

namespace AlphaTraderApiTests\Model;

use Alphatrader\ApiBundle\Model\DesignatedSponsorRating;

/**
 * Class DesignatedSponsorRatingTest
 * @package AlphaTraderApiTests\Model
 */

class DesignatedSponsorRatingTest extends \PHPUnit_Framework_TestCase
{
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
