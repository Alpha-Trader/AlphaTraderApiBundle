<?php
/**
 * User: ljbergmann
 * Date: 05.10.16 01:51
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\Listing;

/**
 * Class ListingTest
 * @package AlphaTraderApiTests\Model
 */

class ListingTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testSecurityIdentifier()
    {
        $Listing = new Listing();
        $this->assertNull($Listing->getSecurityIdentifier());

        $secIdent = $this->getRandomString(32);
        $Listing->setSecurityIdentifier($secIdent);

        $this->assertTrue(is_string($Listing->getSecurityIdentifier()));
        $this->assertEquals($secIdent, $Listing->getSecurityIdentifier());
    }

    public function testType()
    {
        $Listing = new Listing();
        $this->assertNull($Listing->getType());

        $type = $this->getRandomString(12);
        $Listing->setType($type);

        $this->assertTrue(is_string($Listing->getType()));
        $this->assertEquals($type, $Listing->getType());
    }
}
