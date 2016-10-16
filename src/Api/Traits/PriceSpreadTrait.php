<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\PriceSpreadController;

/**
 * Class PriceSpreadTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait PriceSpreadTrait
{
    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PriceSpreadListing[]
     */
    public function getPriceSpreads()
    {
        return $this->getPriceSpreadController()->getPriceSpreads();
    }

    /**
     * @param $secIdent
     *
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PriceSpreadListing
     */
    public function getPriceSpread($secIdent)
    {
        return $this->getPriceSpreadController()->getPriceSpread($secIdent);
    }

    /**
     * @return PriceSpreadController
     */
    public function getPriceSpreadController()
    {
        return new PriceSpreadController($this->config, $this->jwt);
    }
}
