<?php

namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\CentralBankReservesController;

/**
 * Class CentralBankReservesControllerTest
 * @package Alphatrader\ApiBundle\Api\Methods
 * @author Tr0nYx <tronyx@bric.finance>
 */
class CentralBankReservesControllerTest extends BaseTestCase
{
    public function test_getReserveById()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\CentralBankReservesController');
        $request->method('getReserveById')->will($this->returnValue($expected));

        $bankaccount = new CentralBankReservesController($this->config);
        $bankaccount->setClient($this->getClient($expected));
        $val = $bankaccount->getReserveById(1);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $val);
    }
}