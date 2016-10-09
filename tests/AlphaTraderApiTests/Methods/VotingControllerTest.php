<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 06:13
 */

namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\VotingController;

/**
 * Class VotingControllerTest
 * @package AlphaTraderApiTests\Methods
 */

class VotingControllerTest extends BaseTestCase
{
    public function testGetMyPolls()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\VotingController');
        $request->method('getMyPolls')->willReturn($expected);

        $VotingController = new VotingController($this->config);
        $VotingController->setClient($this->getClient($expected));

        $result = $VotingController->getMyPolls();
        var_dump($request);
        $this->assertTrue(is_array($result));
    }
}
