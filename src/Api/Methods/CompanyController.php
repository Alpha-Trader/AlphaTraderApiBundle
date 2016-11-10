<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\UserAccount;

/**
 * Class CompanyController
 *
 * @package AlphaTrader\API\Controller
 * @author  Tr0nYx <tronyx@bric.finance>
 * @author  ljbergmann <l.bergmann@sky-lab.de>
 */
class CompanyController extends ApiClient
{
    /**
     * @return \AlphaTrader\ApiBundle\Model\Company[]|\AlphaTrader\ApiBundle\Model\Error
     */
    public function getAllCompanies()
    {
        $data = $this->get('companies/all/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Company>');
    }

    /**
     * @return \AlphaTrader\ApiBundle\Model\Company[]|\AlphaTrader\ApiBundle\Model\Error
     */
    public function getUserCompanies()
    {
        $data = $this->get('companies/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Company>');
    }

    /**
     * @param $companyid
     *
     * @return \AlphaTrader\ApiBundle\Model\Company|\AlphaTrader\ApiBundle\Model\Error
     */
    public function getCompany($companyid)
    {
        $data = $this->get('companies/' . $companyid);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Company');
    }

    /**
     * @param \Alphatrader\ApiBundle\Model\UserAccount $user
     *
     * @return \AlphaTrader\ApiBundle\Model\Company[]|\AlphaTrader\ApiBundle\Model\Error
     */
    public function getCompanyByUserId(UserAccount $user)
    {
        $data = $this->get('/api/companies/ceo/userid/' . $user->getId());
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Company>');
    }

    /**
     * @param $username
     *
     * @return \AlphaTrader\ApiBundle\Model\Company|\AlphaTrader\ApiBundle\Model\Error
     */
    public function getCompanyByUserName($username)
    {
        $data = $this->get('companies/ceo/username' . $username);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Company>');
    }

    /**
     * @param $securityaccountid
     *
     * @return \AlphaTrader\ApiBundle\Model\Company|\AlphaTrader\ApiBundle\Model\Error
     */
    public function getCompanyBySecurityAccountId($securityaccountid)
    {
        $data = $this->get('companies/securitiesaccount/' . $securityaccountid);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Company');
    }

    /**
     * @param $securityIdentifier
     *
     * @return \AlphaTrader\ApiBundle\Model\Company|\AlphaTrader\ApiBundle\Model\Error
     */
    public function getCompanyBySecurityIdentifier($securityIdentifier)
    {
        $data = $this->get('companies/securityIdentifier/' . $securityIdentifier);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Company');
    }

    /**
     * @param $companyId
     *
     * @return \AlphaTrader\ApiBundle\Model\CompanyProfile|\AlphaTrader\ApiBundle\Model\Error
     */
    public function getCompanyProfile($companyId)
    {
        $data = $this->get('companyprofiles/' . $companyId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\CompanyProfile');
    }

    /**
     * @param $name
     * @return \Alphatrader\ApiBundle\Model\Error|mixed
     */
    public function searchCompanyByName($name)
    {
        $data = $this->get('search/companies/' . $name);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\CompactCompany>');
    }

    /**
     * @param $name
     * @param $cashDeposit
     *
     * @return \AlphaTrader\ApiBundle\Model\Company|\AlphaTrader\ApiBundle\Model\Error
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
     * @return \AlphaTrader\ApiBundle\Model\Company|\AlphaTrader\ApiBundle\Model\Error
     */
    public function addLogo($companyId, $logoUrl)
    {
        $data = $this->put('companies/logo/'.$companyId, ['companyId' => $companyId,'logoUrl' => $logoUrl]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Company');
    }

    /**
     * @param $companyId
     * @return \AlphaTrader\ApiBundle\Model\Company|\AlphaTrader\ApiBundle\Model\Error
     */
    public function removeLogo($companyId)
    {
         $data = $this->delete('companies/logo/'.$companyId, ['companyId' => $companyId]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Company');
    }
}
