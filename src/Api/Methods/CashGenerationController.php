<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Api\Exception\HttpErrorException;
use Alphatrader\ApiBundle\Model\BankAccount;
use Alphatrader\ApiBundle\Model\Error;

/**
 * Class CashGenerationController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class CashGenerationController extends ApiClient
{
    /**
     * @param $cashAmount
     *
     * @throws \Alphatrader\ApiBundle\Api\Exception\HttpErrorException
     * @return BankAccount|Error
     */
    public function generateCash($cashAmount)
    {
        $request = $this->put('cashgeneration/', ['cashAmount' => $cashAmount]);
        return $this->parseResponse($request,'Alphatrader\ApiBundle\Model\BankAccount');
    }
}
