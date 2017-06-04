<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\PriceSpreadController;

/**
 * Class PriceSpreadTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  Tr0nYx
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
     * @param $page
     * @param $size
     * @param $sort
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PriceSpreadPage
     */
    public function getPriceSpreadsV2($page, $size, $sort)
    {
        return $this->getPriceSpreadController()->getPriceSpreadV2($page, $size, $sort);
    }

    /**
     * @return string
     */
    public function getPriceSpreadFilterDefinitions()
    {
        return $this->getPriceSpreadController()->getPriceSpreadFilterDefinitions();
    }

    /**
     * @return string
     */
    public function getUserPriceSpreadFilter()
    {
        return $this->getPriceSpreadController()->getUserPriceSpreadFilter();
    }

    /**
     * @param $filter
     * @param null $filterId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PriceSpreadListing[]
     */
    public function filterPriceSpreads($filter, $filterId = null)
    {
        return $this->getPriceSpreadController()->filterPriceSpreads($filter, $filterId);
    }

    /**
     * @return PriceSpreadController
     */
    public function getPriceSpreadController()
    {
        return new PriceSpreadController($this->config, $this->jwt);
    }
}
