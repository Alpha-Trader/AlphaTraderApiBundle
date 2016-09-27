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
        $data = $this->request('bankaccounts');
        /** @var BankAccount $oResult */
        $oResult = $this->serializer->deserialize($data, 'Alphatrader\ApiBundle\Model\BankAccount', 'json');
        if ($oResult->getCash() == null) {
            $oResult = $this->serializer->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }
}
