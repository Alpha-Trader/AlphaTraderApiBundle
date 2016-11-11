<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\CashTransferLogController;
use Alphatrader\ApiBundle\Model\BankAccount;

/**
 * Class CashTransferLogTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  Tr0nYx
 */
trait CashTransferLogTrait
{
    /**
     * @param \DateTime                                $startDate
     * @param \DateTime                                $endDate
     * @param \Alphatrader\ApiBundle\Model\BankAccount $senderBankAcc
     * @param \Alphatrader\ApiBundle\Model\BankAccount $receiverBankAcc
     *
     * @return \Alphatrader\ApiBundle\Model\CashTransferLogEntry[]
     */
    public function getCashTransferLogs(
        \DateTime $startDate = null,
        \DateTime $endDate = null,
        BankAccount $senderBankAcc = null,
        BankAccount $receiverBankAcc = null
    ) {
        $controller = $this->getCashTransferLogController();

        return $controller->getCashTransferLogs(
            $this->formatTimeStamp($startDate),
            $this->formatTimeStamp($endDate),
            $senderBankAcc,
            $receiverBankAcc
        );
    }

    /**
     * @return CashTransferLogController
     */
    public function getCashTransferLogController()
    {

        return new CashTransferLogController($this->config, $this->jwt);
    }
}
