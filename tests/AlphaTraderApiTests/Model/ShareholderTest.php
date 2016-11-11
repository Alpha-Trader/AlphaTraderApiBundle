<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 03:21
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\Shareholder;

/**
 * Class SecuritySponsorshipTest
 * @package Tests\Model
 */

class ShareholderTest extends \PHPUnit_Framework_TestCase
{
    public function testCompany()
    {
        $shareholder = new Shareholder();
        $this->assertNull($shareholder->getCompany());
        $compactcompany = $this->createMock('Alphatrader\ApiBundle\Model\CompactCompany');

        $shareholder->setCompany($compactcompany);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\CompactCompany', $shareholder->getCompany());
    }

    public function testNumberOfShares()
    {
        $secSpo = new Shareholder();
        $this->assertNull($secSpo->getNumberOfShares());

        $secSpo->setNumberOfShares(1);

        $this->assertTrue(is_int($secSpo->getNumberOfShares()));
        $this->assertEquals(1, $secSpo->getNumberOfShares());
    }

    public function testOutstandingShares()
    {
        $secSpo = new Shareholder();
        $this->assertNull($secSpo->getOutstandingShares());

        $secSpo->setOutstandingShares(25);

        $this->assertEquals(25, $secSpo->getOutstandingShares());
    }

    public function testSecurityIdentifier()
    {
        $secSpo = new Shareholder();
        $this->assertNull($secSpo->getSecurityIdentifier());

        $secSpo->setSecurityIdentifier('ST93272');

        $this->assertEquals('ST93272', $secSpo->getSecurityIdentifier());
    }

    public function testshareInPercent()
    {
        $secSpo = new Shareholder();
        $this->assertNull($secSpo->getShareInPercent());

        $secSpo->setShareInPercent(25);

        $this->assertEquals(25, $secSpo->getShareInPercent());
    }
}
