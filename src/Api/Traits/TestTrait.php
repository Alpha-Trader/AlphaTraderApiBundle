<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Api\Methods\TestController;

/**
 * Trait TestTrait
 * @package Api\Traits
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
trait TestTrait
{

    /**
     * @param $username
     * @param $email
     * @param $password
     * @return \Alphatrader\ApiBundle\Api\Exception\AlphaTraderApiException|\Alphatrader\ApiBundle\Model\BankAccountView
     */
    public function registerUserWithCompany($username, $email, $password)
    {
        return $this->getTestController()->registerUserWithCompany($username, $email, $password);
    }

    /**
     * @return TestController
     */
    public function getTestController()
    {
        return new TestController($this->config, $this->jwt);
    }
}
