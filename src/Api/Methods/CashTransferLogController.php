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

/**
 * Class CashTransferLogController
 *
 * @package AlphaTrader\API\Controller
 * @author  Tr0nYx <tronyx@bric.finance>
 */
class CashTransferLogController extends ApiClient
{
    /**
     * @param                                          $startDate
     * @param                                          $endDate
     * @param \Alphatrader\ApiBundle\Model\BankAccount $senderBankAcc
     * @param \Alphatrader\ApiBundle\Model\BankAccount $receiverBankAcc
     *
     * @return \Alphatrader\ApiBundle\Model\CashTransferLogEntry[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getCashTransferLogs(
        $startDate,
        $endDate,
        BankAccount $senderBankAcc = null,
        BankAccount $receiverBankAcc = null
    ) {
        $request = $this->get(
            'cashtransferlogs/',
            [
                'startDate'             => $startDate,
                'endDate'               => $endDate,
                'senderBankAccountId'   => $senderBankAcc !== null ? $senderBankAcc->getId() : null,
                'receiverBankAccountId' => $receiverBankAcc !== null ? $receiverBankAcc->getId() : null
            ]
        );
        return $this->parseResponse($request, 'ArrayCollection<Alphatrader\ApiBundle\Model\CashTransferLogEntry>');
    }
}
