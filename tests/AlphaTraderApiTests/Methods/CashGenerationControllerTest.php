<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\CashGenerationController;

/**
 * Class CashGenerationControllerTest
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class CashGenerationControllerTest extends BaseTestCase
{
    protected $config = [
        'apiurl'   => 'http://example.com',
        'username' => 'demo',
        'password' => 'password',
        'authid'   => 'partnerid',
        'jwt'      => 'jwttoken'
    ];

    public function test_generateCash()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\CashGenerationController');
        $request->method('generateCash')->will($this->returnValue($expected));

        $bondcontroller = new CashGenerationController($this->config);
        $bondcontroller->setClient($this->getClient($expected));
        try {
            $val = $bondcontroller->generateCash(1);
        } catch (\RuntimeException $val) {
            $this->assertInstanceOf('Alphatrader\ApiBundle\Api\Exception\AlphaTraderApiException', $val);
        }
    }
}
