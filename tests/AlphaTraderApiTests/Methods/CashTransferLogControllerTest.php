<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\CashTransferLogController;


/**
 * Class CashTransferLogControllerTest
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class CashTransferLogControllerTest extends BaseTestCase
{
    public function test_getCashTransferLogs()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\CashTransferLogController');
        $request->method('getCashTransferLogs')->will($this->returnValue($expected));

        $bondcontroller = new CashTransferLogController($this->config);
        $bondcontroller->setClient($this->getClient($expected));
        $val = $bondcontroller->getCashTransferLogs( new \DateTime(), new \DateTime(),1,1);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $val);
    }
}