<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\SecurityOrderLogController;

/**
 * Class SecurityOrderLogTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait SecurityOrderLogTrait
{
    /**
     * @param string    $securityIdentifier
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param string    $buyerSecAccId
     * @param string    $sellerSecAccId
     *
     * @return \Alphatrader\ApiBundle\Model\SecurityOrderLogEntry[]
     */
    public function getSecurityOrderLogs(
        $securityIdentifier = '',
        \DateTime $startDate = null,
        \DateTime $endDate = null,
        $buyerSecAccId = '',
        $sellerSecAccId = ''
    ) {
        $controller = $this->getSecurityOrderLogController();

        return $controller->getSecurityOrderLogs(
            $securityIdentifier,
            $this->formatTimeStamp($startDate),
            $this->formatTimeStamp($endDate),
            $buyerSecAccId,
            $sellerSecAccId
        );
    }

    /**
     * @return SecurityOrderLogController
     */
    public function getSecurityOrderLogController()
    {
        return new SecurityOrderLogController($this->config, $this->jwt);
    }
}