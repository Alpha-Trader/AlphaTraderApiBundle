<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\CashTransferLogController;

/**
 * Class CashTransferLogTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait CashTransferLogTrait
{
    /**
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param null      $senderBankAccId
     * @param null      $receiverBankAccId
     *
     * @return \Alphatrader\ApiBundle\Model\CashTransferLogEntry[]
     */
    public function getCashTransferLogs(
        \DateTime $startDate = null,
        \DateTime $endDate = null,
        $senderBankAccId = null,
        $receiverBankAccId = null
    ) {
        $controller = $this->getCashTransferLogController();

        return $controller->getCashTransferLogs(
            $this->formatTimeStamp($startDate),
            $this->formatTimeStamp($endDate),
            $senderBankAccId,
            $receiverBankAccId
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