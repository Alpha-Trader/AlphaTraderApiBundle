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

/**
 * Class BankAccountController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class BankAccountController extends ApiClient
{
    /**
     * @return Bankaccount|Error
     */
    public function getBankAccount()
    {
        $request = $this->get('bankaccounts');
        return $this->parseResponse($request, 'Alphatrader\ApiBundle\Model\BankAccount');
    }
}
