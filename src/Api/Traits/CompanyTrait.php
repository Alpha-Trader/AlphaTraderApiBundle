<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\CompanyController;
use Alphatrader\ApiBundle\Model\Company;

/**
 * Class CompanyTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait CompanyTrait
{
    /**
     * @param bool $all
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @return Company[]
     */
    public function getCompanies($all = true)
    {
        return $this->getCompanyController()->getCompanies($all);
    }

    /**
     * @param int $companyID
     *
     * @return Company
     */
    public function getCompany($companyID)
    {
        return $this->getCompanyController()->getCompany($companyID);
    }

    /**
     * @param int $userId
     *
     * @return Company[]
     */
    public function getCompaniesByUserId($userId)
    {
        $user = $this->getUserAccountController()->getUserById($userId);

        return $this->getCompanyController()->getCompanyByUserId($user);
    }

    /**
     * @param string $username
     *
     * @return Company[]
     */
    public function getCompaniesByUserName($username)
    {
        return $this->getCompanyController()->getCompanyByUserName($username);
    }

    /**
     * @param int $secAccId
     *
     * @return Company
     */
    public function getCompanyBySecurityAccountId($secAccId)
    {
        return $this->getCompanyController()->getCompanyBySecurityAccountId($secAccId);
    }

    /**
     * @param int $secIdent
     *
     * @return Company
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
     * @return Company
     */
    public function createCompany($name, $cashDeposit)
    {
        return $this->getCompanyController()->createCompany($name, $cashDeposit);
    }

    /**
     * @param $companyId
     * @param $logoUrl
     *
     * @return Company|\Alphatrader\ApiBundle\Model\Error
     */
    public function addLogoToCompany($companyId,$logoUrl){
        return $this->getCompanyController()->addLogo($companyId,$logoUrl);
    }

    /**
     * @param $companyId
     * @return Company|\Alphatrader\ApiBundle\Model\Error
     */
    public function removeLogoFromCompany($companyId){
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