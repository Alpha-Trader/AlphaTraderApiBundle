<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\CentralBankReservesController;
use Alphatrader\ApiBundle\Model\Company;

/**
 * Class CentralBankReservesTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait CentralBankReservesTrait
{
    /**
     * @param $reserveid
     *
     * @return \Alphatrader\ApiBundle\Model\CentralBankReserve
     */
    public function getCentralBankReservesById($reserveid)
    {
        return $this->getCentralBankReservesController()->getReserveById($reserveid);
    }

    /**
     * @param Company $company
     * @param         $cashAmount
     *
     * @return \Alphatrader\ApiBundle\Model\CentralBankReserve
     */
    public function setCompanyCentralBankReserves(Company $company, $cashAmount)
    {
        return $this->getCentralBankReservesController()->increaseReserves($company, $cashAmount);
    }
    
    /**
     * @return CentralBankReservesController
     */
    public function getCentralBankReservesController()
    {
        return new CentralBankReservesController($this->config, $this->jwt);
    }
}
