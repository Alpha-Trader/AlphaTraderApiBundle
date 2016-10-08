<?php
/**
 * User: ljbergmann
 * Date: 29.09.16 21:54
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\CompanyName;

/**
 * Class CompanyNameTest
 * @package Tests\Model
 */

class CompanyNameTest extends \PHPUnit_Framework_TestCase
{
    public function testId()
    {
        $company = new CompanyName();
        $this->assertNull($company->getId());

        $uuid = uniqid();

        $company->setId($uuid);
        $this->assertEquals($uuid, $company->getId());
        $this->assertTrue(is_string($company->getId()));
    }
    
    public function testListing()
    {
        $company = new CompanyName();
        $this->assertNull($company->getListing());

        $listing = $this->createMock('Alphatrader\ApiBundle\Model\Listing');
        $listing->expects($this->any())->method('getSecurityIdentifier')->willReturn($this->getRandomString(12));
        $listing->expects($this->any())->method('getType')->willReturn('Bond');

        $company->setListing($listing);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Listing', $company->getListing());
    }

    public function testName()
    {
        $company = new CompanyName();
        $this->assertNull($company->getName());

        $name = $this->getRandomString(12);

        $company->setName($name);
        $this->assertEquals($name, $company->getName());
        $this->assertTrue(is_string($company->getName()));
    }

    public function testSecurityIdentifier()
    {
        $company = new CompanyName();
        $this->assertNull($company->getSecurityIdentifier());

        $securityIdentifier = $this->getRandomString(6);

        $company->setSecurityIdentifier($securityIdentifier);

        $this->assertEquals($securityIdentifier, $company->getSecurityIdentifier());
        $this->assertTrue(is_string($company->getSecurityIdentifier()));
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
