<?php
/**
 * User: ljbergmann
 * Date: 11.11.16 21:12
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\PriceSpreadListing;

/**
 * Class PriceSpreadListingTest
 * @package Tests\Model
 */

class PriceSpreadListingTest extends \PHPUnit_Framework_TestCase
{
    public function testListing()
    {
        $priceSpreadListing = new PriceSpreadListing();
        $this->assertNull($priceSpreadListing->getListing());

        $listing = $this->createMock('Alphatrader\ApiBundle\Model\Listing');
        $priceSpreadListing->setListing($listing);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Listing', $priceSpreadListing->getListing());
    }
}
