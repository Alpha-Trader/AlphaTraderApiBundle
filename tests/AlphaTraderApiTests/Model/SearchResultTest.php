<?php
/**
 * User: ljbergmann
 * Date: 11.11.16 20:14
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\SearchResult;

/**
 * Class SearchResultTest
 * @package Tests\Model
 */
class SearchResultTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testBond()
    {
        $searchResult = new SearchResult();
        $this->assertNull($searchResult->getBond());

        $bond   = $this->createMock('Alphatrader\ApiBundle\Model\Bond');
        $issuer = $this->createMock('Alphatrader\ApiBundle\Model\CompanyName');

        $bond->expects($this->any())->method('getIssuer')->willReturn($issuer);
        $searchResult->setBond($bond);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Bond', $searchResult->getBond());
    }

    public function testCompany()
    {
        $searchResult = new SearchResult();
        $this->assertNull($searchResult->getCompany());

        $company = $this->createMock('Alphatrader\ApiBundle\Model\CompanyCompactProfile');
        $searchResult->setCompany($company);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\CompanyCompactProfile', $searchResult->getCompany());
    }

    public function testListing()
    {
        $searchResult = new SearchResult();
        $this->assertNull($searchResult->getListing());

        $listing = $this->createMock('Alphatrader\ApiBundle\Model\Listing');
        $searchResult->setListing($listing);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Listing', $searchResult->getListing());
    }

    public function testNaturalIdentifier()
    {
        $searchResult = new SearchResult();
        $this->assertNull($searchResult->getNaturalIdentifier());

        $string = $this->getRandomString(12);
        $searchResult->setNaturalIdentifier($string);

        $this->assertTrue(is_string($searchResult->getNaturalIdentifier()));
        $this->assertEquals($string, $searchResult->getNaturalIdentifier());
    }

    public function testSystemBond()
    {
        $searchResult = new SearchResult();
        $this->assertNull($searchResult->getUserAccount());

        $bond = $this->createMock('Alphatrader\ApiBundle\Model\SystemBond');
        $searchResult->setSystemBond($bond);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\SystemBond', $searchResult->getSystemBond());
    }
    
    public function testUserAccount()
    {
        $searchResult = new SearchResult();
        $this->assertNull($searchResult->getUserAccount());

        $userAccount = $this->createMock('Alphatrader\ApiBundle\Model\UserAccount');
        $searchResult->setUserAccount($userAccount);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserAccount', $searchResult->getUserAccount());
    }
}
