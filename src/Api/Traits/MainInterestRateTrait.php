<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\MainInterestRateController;

/**
 * Class MainInterestRateTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  Tr0nYx
 */
trait MainInterestRateTrait
{
    /**
     * @return \Alphatrader\ApiBundle\Model\MainInterestRate[]
     */
    public function getMainInterestRate()
    {
        return $this->getMainInterestRateController()->getMainInterestRate();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\MainInterestRate
     */
    public function getLatestMainInterestRate()
    {
        return $this->getMainInterestRateController()->getLatestMainInterestRate();
    }

    /**
     * @return MainInterestRateController
     */
    public function getMainInterestRateController()
    {
        return new MainInterestRateController($this->config, $this->jwt);
    }
}
