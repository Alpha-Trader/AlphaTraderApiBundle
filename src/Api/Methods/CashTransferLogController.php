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
use Alphatrader\ApiBundle\Model\CashTransferLogEntry;
use Alphatrader\ApiBundle\Model\Error;

/**
 * Class CashTransferLogController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class CashTransferLogController extends ApiClient
{
    /**
     * @param $startDate
     * @param $endDate
     * @param $senderBankAccountId
     * @param $receiverBankAccountId
     *
     * @return CashTransferLogEntry[]|Error
     */
    public function getCashTransferLogs(
        $startDate,
        $endDate,
        $senderBankAccountId,
        $receiverBankAccountId
    ) {
        $data = $this->get(
            'cashtransferlogs/',
            [
                'startDate'             => $startDate,
                'endDate'               => $endDate,
                'senderBankAccountId'   => $senderBankAccountId,
                'receiverBankAccountId' => $receiverBankAccountId
            ]
        );
        /** @var CashTransferLogEntry[] $oResult */
        $oResult = $this->serializer->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\CashTransferLogEntry>',
            'json'
        );
        if (!empty($oResult) && $oResult[0]->getAmount() == null) {
            $oResult = $this->serializer->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }
}
