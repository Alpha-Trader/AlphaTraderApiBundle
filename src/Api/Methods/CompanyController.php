<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Api\Exception\HttpErrorException;
use AlphaTrader\ApiBundle\Model\Company;
use Alphatrader\ApiBundle\Model\CompanyProfile;
use Alphatrader\ApiBundle\Model\Error;
use Alphatrader\ApiBundle\Model\UserAccount;

/**
 * Class CompanyController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class CompanyController extends ApiClient
{
    /**
     * @return Company[]|Error
     */
    public function getAllCompanies()
    {
        $data = $this->get('companies/all/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Company>');
    }

    /**
     * @return Company[]|Error
     */
    public function getUserCompanies()
    {
        $data = $this->get('companies/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Company>');
    }

    /**
     * @param $companyid
     *
     * @return Company|Error
     */
    public function getCompany($companyid)
    {
        $data = $this->get('companies/' . $companyid);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Company');
    }

    /**
     * @param \Alphatrader\ApiBundle\Model\UserAccount $user
     *
     * @return Company[]|Error
     */
    public function getCompanyByUserId(UserAccount $user)
    {
        $data = $this->get('/api/companies/ceo/userid/' . $user->getId());
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Company>');
    }

    /**
     * @param $username
     *
     * @return Company|Error
     */
    public function getCompanyByUserName($username)
    {
        $data = $this->get('companies/ceo/username' . $username);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Company>');
    }

    /**
     * @param $securityaccountid
     *
     * @return Company|Error
     */
    public function getCompanyBySecurityAccountId($securityaccountid)
    {
        $data = $this->get('companies/securitiesaccount/' . $securityaccountid);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Company');
    }

    /**
     * @param $securityIdentifier
     *
     * @return Company|Error
     */
    public function getCompanyBySecurityIdentifier($securityIdentifier)
    {
        $data = $this->get('companies/securityIdentifier/' . $securityIdentifier);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Company');
    }

    /**
     * @param $companyId
     *
     * @return CompanyProfile|Error
     */
    public function getCompanyProfile($companyId)
    {
        $data = $this->get('companyprofiles/' . $companyId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\CompanyProfile');
    }

    /**
     * @param $name
     * @param $cashDeposit
     *
     * @return Company|Error
     */
    public function createCompany($name, $cashDeposit)
    {
        $data = $this->post('companies/', ['name' => $name, 'cashDeposit' => $cashDeposit]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Company');
    }

    /**
     * @param $companyId
     * @param $logoUrl
     *
     * @return Company|Error
     */
    public function addLogo($companyId, $logoUrl)
    {
        $data = $this->put('companies/logo/'.$companyId, ['companyId' => $companyId,'logoUrl' => $logoUrl]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Company');
    }

    /**
     * @param $companyId
     * @return Company|Error
     */
    public function removeLogo($companyId)
    {
         $data = $this->delete('companies/logo/'.$companyId, ['companyId' => $companyId]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Company');
    }
}
