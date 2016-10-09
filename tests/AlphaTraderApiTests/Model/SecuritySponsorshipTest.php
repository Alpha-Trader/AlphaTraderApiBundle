<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 03:21
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\SecuritySponsorship;

/**
 * Class SecuritySponsorshipTest
 * @package Tests\Model
 */

class SecuritySponsorshipTest extends \PHPUnit_Framework_TestCase
{
    public function testDesignatedSponsor()
    {
        $secSpo = new SecuritySponsorship();
        $this->assertNull($secSpo->getDesignatedSponsor());

        $desSpo = $this->createMock("Alphatrader\ApiBundle\Model\CompactCompany");
        $secSpo->setDesignatedSponsor($desSpo);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\CompactCompany", $secSpo->getDesignatedSponsor());
    }

    public function testListing()
    {
        $secSpo = new SecuritySponsorship();
        $this->assertNull($secSpo->getListing());

        $listing = $this->createMock("Alphatrader\ApiBundle\Model\Listing");
        $secSpo->setListing($listing);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\Listing", $secSpo->getListing());
    }

    public function testSponsorRating()
    {
        $secSpo = new SecuritySponsorship();
        $this->assertNull($secSpo->getListing());

        $dsr = $this->createMock("Alphatrader\ApiBundle\Model\DesignatedSponsorRating");
        $secSpo->setSponsorRating($dsr);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\DesignatedSponsorRating", $secSpo->getSponsorRating());
    }
}
