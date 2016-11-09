<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\CashGenerationController;

/**
 * Class CashGenerationTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  Tr0nYx
 */
trait CashGenerationTrait
{
    /**
     * @param $cashAmount
     *
     * @return \Alphatrader\ApiBundle\Model\BankAccount
     */
    public function generateCash($cashAmount)
    {
        return $this->getCashGenerationController()->generateCash($cashAmount);
    }
    
    /**
     * @return CashGenerationController
     */
    public function getCashGenerationController()
    {
        return new CashGenerationController($this->config, $this->jwt);
    }
}
