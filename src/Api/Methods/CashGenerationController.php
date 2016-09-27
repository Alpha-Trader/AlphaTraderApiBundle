<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
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
     * @return BankAccount|Error
     */
    public function generateCash($cashAmount)
    {
        $data = $this->put('cashgeneration/', ['cashAmount' => $cashAmount]);
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
