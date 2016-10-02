<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\BankingLicenseController;
use Alphatrader\ApiBundle\Model\Company;

/**
 * Class BankingLicenseTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait BankingLicenseTrait
{
    /**
     * @param Company $company
     *
     * @return \Alphatrader\ApiBundle\Model\BankingLicense
     */
    public function createBankingLicense(Company $company)
    {
        return $this->getBankingLicenseController()->createBankingLicense($company);
    }

    /**
     * @param Company $company
     *
     * @return \Alphatrader\ApiBundle\Model\BankingLicense
     */
    public function getBankingLicense(Company $company)
    {
        return $this->getBankingLicenseController()->getBankingLicense($company);
    }

    /**
     * @return BankingLicenseController
     */
    public function getBankingLicenseController()
    {
        return new BankingLicenseController($this->config, $this->jwt);
    }
}
