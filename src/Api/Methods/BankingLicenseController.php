<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\BankingLicense;
use Alphatrader\ApiBundle\Model\Company;
use Alphatrader\ApiBundle\Model\Error;

/**
 * Class BankingLicenseController
 *
 * @package AlphaTrader\API\Controller
 * @author  Tr0nYx <tronyx@bric.finance>
 */
class BankingLicenseController extends ApiClient
{
    /**
     * @param Company $company
     *
     * @return BankingLicense|Error
     */
    public function createBankingLicense(Company $company)
    {
        $request = $this->post('bankinglicense/', ['companyId' => $company->getId()]);
        return $this->parseResponse($request, 'Alphatrader\ApiBundle\Model\BankingLicense');
    }

    /**
     * @param Company $company
     *
     * @return BankingLicense|Error
     */
    public function getBankingLicense(Company $company)
    {
        $request = $this->get('bankinglicense/', ['companyId' => $company->getId()]);
        return $this->parseResponse($request, 'Alphatrader\ApiBundle\Model\BankingLicense');
    }
}
