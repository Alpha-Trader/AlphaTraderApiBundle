<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use AlphaTrader\ApiBundle\Model\Bankaccount;
use Alphatrader\ApiBundle\Model\BankingLicense;
use Alphatrader\ApiBundle\Model\Company;
use Alphatrader\ApiBundle\Model\Error;
use JMS\Serializer\SerializerBuilder;

/**
 * Class BankingLicenseController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
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
        $data = $this->post('bankinglicense/', ['companyId' => $company->getId()]);
        /** @var BankingLicense $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\BankingLicense', 'json');
        if ($oResult->getCompany() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param Company $company
     *
     * @return BankingLicense|Error
     */
    public function getBankingLicense(Company $company)
    {
        $data = $this->get('bankinglicense/', ['companyId' => $company->getId()]);
        /** @var BankingLicense $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\BankingLicense', 'json');
        if ($oResult->getCompany() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }
}
