<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Api\Exception\HttpErrorException;
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
     * @param int $reserveId
     *
     * @throws \Alphatrader\ApiBundle\Api\Exception\HttpErrorException
     * @return CentralBankReserve|Error
     */
    public function getReserveById($reserveId)
    {
        $request = $this->get('centralbankreserves/' . $reserveId);
        return $this->parseResponse($request, 'Alphatrader\ApiBundle\Model\CentralBankReserve');
    }

    /**
     * @param string companyId
     *
     * @return CentralBankReserve|Error
     */
    public function getReserveByCompanyId($companyId){
        $data = $this->get('centralbankreserves/', ['companyId' => $companyId]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\CentralBankReserve');
    }

    /**
     * @param Company $company
     * @param         $cashAmount
     *
     * @return CentralBankReserve
     * @throws \Alphatrader\ApiBundle\Api\Exception\HttpErrorException
     */
    public function increaseReserves(Company $company, $cashAmount)
    {
        $request = $this->put('centralbankreserves/', ['companyId' => $company->getId(), 'cashAmount' => $cashAmount]);
        return $this->parseResponse($request, 'Alphatrader\ApiBundle\Model\CentralBankReserve');
    }
}
