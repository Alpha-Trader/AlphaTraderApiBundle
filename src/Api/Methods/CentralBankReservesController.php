<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\CentralBankReserve;
use Alphatrader\ApiBundle\Model\Company;
use Alphatrader\ApiBundle\Model\Error;

/**
 * Class CentralBankReservesController
 * @package Alphatrader\ApiBundle\Api\Methods
 * @author Tr0nYx <tronyx@bric.finance>
 */
class CentralBankReservesController extends ApiClient
{
    /**
     * @param sting $reserveId
     *
     * @return CentralBankReserve|Error
     */
    public function getReserveById($reserveId)
    {
        $data = $this->get('centralbankreserves/' . $reserveId);
        /** @var CentralBankReserve $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\CentralBankReserve', 'json');
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
     * @param string companyId
     *
     * @return CentralBankReserve|Error
     */
    public function getReserveByCompanyId($companyId){
        $data = $this->get('centralbankreserves/companyId?=' . $companyId);
        /** @var CentralBankReserve $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\CentralBankReserve', 'json');
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    public function increaseReserves(Company $company, $cashAmount)
    {
        $data = $this->put('centralbankreserves/', ['companyId'=>$company->getId(),'cashAmount'=>$cashAmount]);
        /** @var CentralBankReserve $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\CentralBankReserve', 'json');
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
