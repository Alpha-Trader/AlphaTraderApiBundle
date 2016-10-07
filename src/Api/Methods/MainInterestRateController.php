<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use AlphaTrader\ApiBundle\Model\Bankaccount;
use Alphatrader\ApiBundle\Model\Error;
use Alphatrader\ApiBundle\Model\Listing;
use Alphatrader\ApiBundle\Model\MainInterestRate;
use JMS\Serializer\SerializerBuilder;

/**
 * Class MainInterestRateController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class MainInterestRateController extends ApiClient
{
    /**
     * @return MainInterestRate[]|Error
     */
    public function getMainInterestRate()
    {
        $data = $this->get('maininterestrate/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\MainInterestRate>');
    }

    /**
     * @return MainInterestRate|Error
     */
    public function getLatestMainInterestRate()
    {
        $data = $this->get('maininterestrate/latest/');
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\MainInterestRate');
    }
}
