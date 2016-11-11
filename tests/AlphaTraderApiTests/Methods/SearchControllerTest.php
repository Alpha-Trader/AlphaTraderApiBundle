<?php
/**
 * User: ljbergmann
 * Date: 11.11.16 22:18
 */

namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\SearchController;

/**
 * Class SearchControllerTest
 * @package Tests\Methods
 */
class SearchControllerTest extends BaseTestCase
{
    public function testSearch()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\SearchController');
        $request->method('search')->willReturn($expected);

        $searchController = new SearchController($this->config);
        $searchController->setClient($this->getClient($expected));

        $value = $searchController->search("UnitTest");

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Error', $value);
    }
}
