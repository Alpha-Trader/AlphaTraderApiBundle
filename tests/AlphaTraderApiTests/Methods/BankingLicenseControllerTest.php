<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\BankingLicenseController;
use Alphatrader\ApiBundle\Model\Company;

/**
 * Class BankingLicenseControllerTest
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class BankingLicenseControllerTest extends BaseTestCase
{
    public function test_createBankingLicenseWithError()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\BankingLicenseController');
        $request->method('createBankingLicense')->will($this->returnValue($expected));

        $company = new Company();
        $company->setId(1);
        $bankaccount = new BankingLicenseController($this->config);
        $bankaccount->setClient($this->getClient($expected));
        $val = $bankaccount->createBankingLicense($company);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $val);
    }

    public function test_getBankingLicenseWithError()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\BankingLicenseController');
        $request->method('getBankingLicense')->will($this->returnValue($expected));

        $company = new Company();
        $company->setId(1);
        $bankaccount = new BankingLicenseController($this->config);
        $bankaccount->setClient($this->getClient($expected));
        $val = $bankaccount->getBankingLicense($company);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $val);
    }
}
