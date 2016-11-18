<?php

namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\ListingController;

/**
 * Class ListingControllerTest
 *
 * @package AlphaTrader\API\Controller
 * @author  Tr0nYx <tronyx@bric.finance>
 */
class ListingControllerTest extends BaseTestCase
{
    public function test_getProfile()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\ListingController');
        $request->method('getProfile')->willReturn($expected);

        $listingController = new ListingController($this->config);
        $listingController->setClient($this->getClient($expected));

        $value = $listingController->getProfile('ST345661');

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\ListingProfile', $value);
    }

    public function test_getAllListings()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\ListingController');
        $request->method('getAllListings')->willReturn($expected);

        $listingController = new ListingController($this->config);
        $listingController->setClient($this->getClient($expected));

        $value = $listingController->getAllListings();

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Error', $value);
    }

    public function test_getOutstandingShares()
    {
        $expected = '50000';
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\ListingController');
        $request->method('getOutstandingShares')->willReturn($expected);

        $listingController = new ListingController($this->config);
        $listingController->setClient($this->getClient($expected));

        $value = $listingController->getOutstandingShares('ST345661');

        $this->assertTrue(is_int($value));
    }

    public function test_getListingBySecurityIdentifier()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\ListingController');
        $request->method('getListingBySecurityIdentifier')->willReturn($expected);

        $listingController = new ListingController($this->config);
        $listingController->setClient($this->getClient($expected));
        try {
            $value = $listingController->getListingBySecurityIdentifier('ST345661');
        } catch (\RuntimeException $value) {
            $this->assertInstanceOf('Alphatrader\ApiBundle\Api\Exception\AlphaTraderApiException', $value);
        }
    }

    public function test_getListingBySecurityIdentifierPart()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\ListingController');
        $request->method('getListingBySecurityIdentifierPart')->willReturn($expected);

        $listingController = new ListingController($this->config);
        $listingController->setClient($this->getClient($expected));

        $value = $listingController->getListingBySecurityIdentifierPart('ST34566');

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Error', $value);
    }

    public function test_getShareholder()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\ListingController');
        $request->method('getShareholder')->willReturn($expected);

        $listingController = new ListingController($this->config);
        $listingController->setClient($this->getClient($expected));

        $value = $listingController->getShareholder('ST34566');

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Error', $value);
    }
}
