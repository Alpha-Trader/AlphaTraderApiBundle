<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\OrderCheck;
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
        $data = $this->get('securityorders/'. $secIdent);
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'Alphatrader\ApiBundle\Model\SecurityOrder',
            'json'
        );
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }

        return $oResult;
    }

    /**
     * @param $owner
     * @param $secIdent
     * @param $action
     * @param $type
     * @param $price
     * @param $numberOfShares
     * @param $counterparty
     *
     * @return SecurityOrder
     */
    public function createSecurityOrder($owner, $secIdent, $action, $type, $price, $numberOfShares, $counterparty)
    {

        $data = $this->post(
            'securityorders',
            [
                'owner'              => $owner,
                'securityIdentifier' => $secIdent,
                'action'             => $action,
                'type'               => $type,
                'price'              => $price,
                'numberOfShares'     => $numberOfShares,
                'counterparty'       => $counterparty
            ]
        );
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'Alphatrader\ApiBundle\Model\SecurityOrder',
            'json'
        );
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }

        return $oResult;
    }

    /**
     * @param $owner
     * @param $secIdent
     * @param $numberOfShares
     * @param $price
     *
     * @return OrderCheck
     */
    public function checkSecurityOrder($owner, $secIdent, $numberOfShares, $price)
    {

        $data = $this->get(
            'securityorders/check/',
            [
                'owner'              => $owner,
                'securityIdentifier' => $secIdent,
                'price'              => $price,
                'numberOfShares'     => $numberOfShares
            ]
        );
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'Alphatrader\ApiBundle\Model\OrderCheck',
            'json'
        );
        if ($oResult->getNumberOfShares() === null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }

        return $oResult;
    }
}
