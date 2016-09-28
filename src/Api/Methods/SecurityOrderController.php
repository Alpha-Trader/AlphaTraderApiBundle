<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\SecurityOrder;

/**
 * Class SecurityOrderController
 * @package Alphatrader\ApiBundle\Api\Methods
 */
class SecurityOrderController extends ApiClient
{
    /**
     * @param $secIdent
     *
     * @return SecurityOrder
     */
    public function getSecurityOrder($secIdent)
    {
        $data = $this->get('securityorders', ['securityIdentifier' => $secIdent]);
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'Alphatrader\ApiBundle\Model\SecurityOrder',
            'json'
        );

        return $oResult;
    }
}
