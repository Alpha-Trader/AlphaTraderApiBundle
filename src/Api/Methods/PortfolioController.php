<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\Error;
use Alphatrader\ApiBundle\Model\Portfolio;
use JMS\Serializer\SerializerBuilder;

/**
 * Class PortfolioController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class PortfolioController extends ApiClient
{
    /**
     * @param $securitiesAccountId
     *
     * @return Portfolio|Error
     */
    public function getPortfolio($securitiesAccountId)
    {
        $data = $this->get('portfolios/' . $securitiesAccountId);
        return $this->parseResponse($data,'Alphatrader\ApiBundle\Model\Portfolio');
    }
}
