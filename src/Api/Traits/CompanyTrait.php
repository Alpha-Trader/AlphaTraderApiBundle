<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\CompanyController;

/**
 * Class CompanyTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  Tr0nYx
 */
trait CompanyTrait
{
    /**
     * @return \AlphaTrader\ApiBundle\Model\Company[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getAllCompanies()
    {
        return $this->getCompanyController()->getAllCompanies();
    }

    /**
     * @return \AlphaTrader\ApiBundle\Model\Company[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getMyCompanies()
    {
        return $this->getCompanyController()->getUserCompanies();
    }

    /**
     * @param int $companyID
     *
     * @return \Alphatrader\ApiBundle\Model\Company
     */
    public function getCompany($companyID)
    {
        return $this->getCompanyController()->getCompany($companyID);
    }

    /**
     * @param int $userId
     *
     * @return \Alphatrader\ApiBundle\Model\Company[]
     */
    public function getCompaniesByUserId($userId)
    {
        $user = $this->getUserAccountController()->getUserById($userId);

        return $this->getCompanyController()->getCompanyByUserId($user);
    }

    /**
     * @param string $username
     *
     * @return \Alphatrader\ApiBundle\Model\Company[]
     */
    public function getCompaniesByUserName($username)
    {
        return $this->getCompanyController()->getCompanyByUserName($username);
    }

    /**
     * @param int $secAccId
     *
     * @return \Alphatrader\ApiBundle\Model\Company
     */
    public function getCompanyBySecurityAccountId($secAccId)
    {
        return $this->getCompanyController()->getCompanyBySecurityAccountId($secAccId);
    }

    /**
     * @param int $secIdent
     *
     * @return \Alphatrader\ApiBundle\Model\Company
     */
    public function getCompanyBySecurityIdentifier($secIdent)
    {
        return $this->getCompanyController()->getCompanyBySecurityIdentifier($secIdent);
    }

    /**
     * @param int $companyId
     *
     * @return \Alphatrader\ApiBundle\Model\CompanyProfile
     */
    public function getCompanyProfile($companyId)
    {
        return $this->getCompanyController()->getCompanyProfile($companyId);
    }

    /**
     * @param $name
     * @param $cashDeposit
     *
     * @return \Alphatrader\ApiBundle\Model\Company
     */
    public function createCompany($name, $cashDeposit)
    {
        return $this->getCompanyController()->createCompany($name, $cashDeposit);
    }

    /**
     * @param $companyId
     * @param $logoUrl
     *
     * @return \Alphatrader\ApiBundle\Model\Company|\Alphatrader\ApiBundle\Model\Error
     */
    public function addLogoToCompany($companyId, $logoUrl)
    {
        return $this->getCompanyController()->addLogo($companyId, $logoUrl);
    }

    /**
     * @param $companyId
     * @return \Alphatrader\ApiBundle\Model\Company|\Alphatrader\ApiBundle\Model\Error
     */
    public function removeLogoFromCompany($companyId)
    {
        return $this->getCompanyController()->removeLogo($companyId);
    }

    /**
     * @return CompanyController
     */
    public function getCompanyController()
    {
        return new CompanyController($this->config, $this->jwt);
    }
}
