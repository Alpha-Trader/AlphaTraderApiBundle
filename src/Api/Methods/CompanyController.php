<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
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
     * @param $all
     *
     * @return Company[]|Error
     */
    public function getCompanies($all)
    {
        $data = $all == true ? $this->get('companies/all/') : $this->get('companies/');
        /** @var Company[] $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\Company>',
            'json'
        );
        if (!is_array($oResult)) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param $companyid
     *
     * @return Company|Error
     */
    public function getCompany($companyid)
    {
        $data = $this->get('companies/' . $companyid);
        /** @var Company $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'Alphatrader\ApiBundle\Model\Company',
            'json'
        );
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param \Alphatrader\ApiBundle\Model\UserAccount $user
     *
     * @return Company[]|Error
     */
    public function getCompanyByUserId(UserAccount $user)
    {
        $data = $this->get('/api/companies/ceo/userid/' . $user->getId());
        /** @var Company[] $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\Company>',
            'json'
        );
        if (!is_array($oResult)) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param $username
     *
     * @return Company|Error
     */
    public function getCompanyByUserName($username)
    {
        $data = $this->get('companies/ceo/username' . $username);
        /** @var Company[] $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\Company>',
            'json'
        );
        if (!is_array($oResult)) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param $securityaccountid
     *
     * @return Company|Error
     */
    public function getCompanyBySecurityAccountId($securityaccountid)
    {
        $data = $this->get('companies/securitiesaccount/' . $securityaccountid);
        /** @var Company $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'Alphatrader\ApiBundle\Model\Company',
            'json'
        );
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param $securityIdentifier
     *
     * @return Company|Error
     */
    public function getCompanyBySecurityIdentifier($securityIdentifier)
    {
        $data = $this->get('companies/securityIdentifier/' . $securityIdentifier);
        /** @var Company $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'Alphatrader\ApiBundle\Model\Company',
            'json'
        );
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param $companyId
     *
     * @return CompanyProfile|Error
     */
    public function getCompanyProfile($companyId)
    {
        $data = $this->get('companyprofiles/' . $companyId);
        /** @var CompanyProfile $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'Alphatrader\ApiBundle\Model\CompanyProfile',
            'json'
        );
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
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
        /** @var Company $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'Alphatrader\ApiBundle\Model\Company',
            'json'
        );
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param $companyId
     * @param $logoUrl
     * 
     * @return Company|Error
     */
    public function addLogo($companyId,$logoUrl){
        $data = $this->put('companies/logo/'.$companyId,['companyId' => $companyId,'logoUrl' => $logoUrl]);
        /** @var Company $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'Alphatrader\ApiBundle\Model\Company',
            'json'
        );
        
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param $companyId
     * @return Company|Error
     */
    public function removeLogo($companyId)
    {
         $data = $this->delete('companies/logo/'.$companyId,['companyId' => $companyId]);
         /** @var Company $oResult */
         $oResult = $this->getSerializer()->deserialize(
             $data,
             'Alphatrader\ApiBundle\Model\Company',
             'json'
         );
         if ($oResult->getId() == null) {
             $oResult = $this->getSerializer()->deserialize(
                 $data,
                 'Alphatrader\ApiBundle\Model\Error',
                 'json'
             );
         }
         return $oResult;
    }
}
