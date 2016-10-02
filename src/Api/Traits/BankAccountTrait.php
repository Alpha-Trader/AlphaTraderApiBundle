<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\BankAccountController;

/**
 * Class BankAccountTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait BankAccountTrait
{
    /**
     * @return \Alphatrader\ApiBundle\Model\Bankaccount
     */
    public function getBankAccount()
    {
        return $this->getBankAccountController()->getBankAccount();
    }

    /**
     * @return BankAccountController
     */
    public function getBankAccountController()
    {
        return new BankAccountController($this->config, $this->jwt);
    }
}
