<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\PortfolioController;

/**
 * Class PortfolioTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  Tr0nYx
 */
trait PortfolioTrait
{
    /**
     * @param string $securitiesAccountId
     *
     * @return \Alphatrader\ApiBundle\Model\Portfolio
     */
    public function getPortfolio($securitiesAccountId)
    {
        return $this->getPortfolioController()->getPortfolio($securitiesAccountId);
    }

    /**
     * @param string $securitiesAccountId
     *
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Portfolio
     */
    public function getFixedIncomeSecurities($securitiesAccountId)
    {
        return $this->getPortfolioController()->getFixedIncomeSecurities($securitiesAccountId);
    }

    /**
     * @return PortfolioController
     */
    public function getPortfolioController()
    {
        return new PortfolioController($this->config, $this->jwt);
    }
}
