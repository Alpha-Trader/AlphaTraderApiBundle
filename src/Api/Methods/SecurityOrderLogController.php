<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\SecurityOrderLogEntry;

/**
 * Class SecurityOrderLogController
 * @package Alphatrader\ApiBundle\Api\Methods
 */
class SecurityOrderLogController extends ApiClient
{
    /**
     * @param $securityIdentifier
     * @param $startDate
     * @param $endDate
     * @param $buyerSecAccId
     * @param $sellerSecAccId
     *
     * @return SecurityOrderLogEntry
     */
    public function getSecurityOrderLogs(
        $securityIdentifier,
        $startDate,
        $endDate,
        $buyerSecAccId,
        $sellerSecAccId
    ) {
        $data = $this->get(
            'securityorderlogs',
            [
                'securityIdentifier'        => $securityIdentifier,
                'startDate'                 => $startDate,
                'endDate'                   => $endDate,
                'buyerSecuritiesAccountId'  => $buyerSecAccId,
                'sellerSecuritiesAccountId' => $sellerSecAccId
            ]
        );
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\SecurityOrderLogEntry>');
    }
}
