<?php
/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;

/**
 * Class PortfolioController
 *
 * @package AlphaTrader\API\Controller
 * @author  Tr0nYx <tronyx@bric.finance>
 */
class PortfolioController extends ApiClient
{
    /**
     * @param $securitiesAccountId
     *
     * @return \Alphatrader\ApiBundle\Model\Portfolio|\Alphatrader\ApiBundle\Model\Error
     */
    public function getPortfolio($securitiesAccountId)
    {
        $data = $this->get('portfolios/' . $securitiesAccountId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Portfolio');
    }

    /**
     * @param $securitiesAccountId
     * @return \Alphatrader\ApiBundle\Model\Portfolio|\Alphatrader\ApiBundle\Model\Error
     */
    public function getFixedIncomeSecurities($securitiesAccountId)
    {
        $data = $this->get('portfolios/fixedincome/'.$securitiesAccountId);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\FixedIncomeSecurity>');
    }
}
