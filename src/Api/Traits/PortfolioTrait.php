<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\PortfolioController;

/**
 * Class PortfolioTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait PortfolioTrait
{
    /**
     * @param $secAccId
     *
     * @return \Alphatrader\ApiBundle\Model\Portfolio
     */
    public function getPortfolio($secAccId)
    {
        return $this->getPortfolioController()->getPortfolio($secAccId);
    }

    /**
     * @return PortfolioController
     */
    public function getPortfolioController()
    {
        return new PortfolioController($this->config, $this->jwt);
    }
}