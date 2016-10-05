<?php
/**
 * User: ljbergmann
 * Date: 05.10.16 01:51
 */

namespace AlphaTraderApiTests\Model;

use Alphatrader\ApiBundle\Model\Listing;

/**
 * Class ListingTest
 * @package AlphaTraderApiTests\Model
 */

class ListingTest extends \PHPUnit_Framework_TestCase
{
    public function testSecurityIdentifier(){
        $Listing = new Listing();
        $this->assertNull($Listing->getSecurityIdentifier());

        $secIdent = $this->getRandomString(32);
        $Listing->setSecurityIdentifier($secIdent);

        $this->assertTrue(is_string($Listing->getSecurityIdentifier()));
        $this->assertEquals($secIdent,$Listing->getSecurityIdentifier());
    }

    public function testType(){
        $Listing = new Listing();
        $this->assertNull($Listing->getType());

        $type = $this->getRandomString(12);
        $Listing->setType($type);

        $this->assertTrue(is_string($Listing->getType()));
        $this->assertEquals($type,$Listing->getType());
    }

    /*
    * @param $length
    */
    private function getRandomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
}
