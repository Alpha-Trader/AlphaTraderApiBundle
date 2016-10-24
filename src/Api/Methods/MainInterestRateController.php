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
 * Class MainInterestRateController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class MainInterestRateController extends ApiClient
{
    /**
     * @return \Alphatrader\ApiBundle\Model\MainInterestRate[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getMainInterestRate()
    {
        $data = $this->get('maininterestrate/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\MainInterestRate>');
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\MainInterestRate|\Alphatrader\ApiBundle\Model\Error
     */
    public function getLatestMainInterestRate()
    {
        $data = $this->get('maininterestrate/latest/');
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\MainInterestRate');
    }
}
