<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\BankAccountController;
use AlphaTrader\ApiBundle\Model\Bankaccount;
use Alphatrader\ApiBundle\Model\Error;

/**
 * Class BankAccountController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class BankAccountControllerTest extends BaseTestCase
{
    /**
     * @return Bankaccount
     */
    public function test_getBankAccount()
    {
        $expected = '{"cash": 50000,"id": "3b6fcf48-e8ef-404f-b688-88ec41ea5e80"}';
        $result = json_decode($expected);

        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\BankAccountController');
        $request->method('getBankAccount')->will($this->returnValue($expected));

        $bankaccount = new BankAccountController($this->config);
        $bankaccount->setClient($this->getClient($expected));
        $val = $bankaccount->getBankAccount();

        $this->assertEquals($result->id, $val->getId());
    }

    /**
     * @return Bankaccount
     */
    public function test_getBankAccountWithoutCash()
    {
        $expected = '{"nocash": 50000,"id": "3b6fcf48-e8ef-404f-b688-88ec41ea5e80"}';

        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\BankAccountController');
        $request->method('getBankAccount')->will($this->returnValue($expected));

        $bankaccount = new BankAccountController($this->config);
        $bankaccount->setClient($this->getClient($expected));
        /** @var Error $val */
        $val = $bankaccount->getBankAccount();

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $val);
    }
}
