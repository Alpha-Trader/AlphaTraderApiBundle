<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\SecurityOrderController;

/**
 * Class SecurityOrderTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  Tr0nYx
 */
trait SecurityOrderTrait
{
    /**
     * @param $secIdent
     *
     * @return \Alphatrader\ApiBundle\Model\SecurityOrder
     */
    public function getOrder($secIdent)
    {
        return $this->getSecurityOrderController()->getSecurityOrder($secIdent);
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
     * @return \Alphatrader\ApiBundle\Model\SecurityOrder
     */
    public function createOrder($owner, $secIdent, $action, $type, $price, $numberOfShares, $counterparty = null)
    {
        return $this->getSecurityOrderController()->createSecurityOrder(
            $owner,
            $secIdent,
            $action,
            $type,
            $price,
            $numberOfShares,
            $counterparty
        );
    }

    /**
     * @param $owner
     * @param $securityIdentifier
     * @param $numberOfShares
     * @param $price
     *
     * @return \Alphatrader\ApiBundle\Model\OrderCheck
     */
    public function checkOrder($owner, $securityIdentifier, $numberOfShares = 0, $price = null)
    {
        return $this->getSecurityOrderController()->checkSecurityOrder(
            $owner,
            $securityIdentifier,
            $numberOfShares,
            $price
        );
    }

    /**
     * @param $secIdent
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\SecurityOrder[]
     */
    public function getUnfilledOrders($secIdent)
    {
        return $this->getSecurityOrderController()->getUnfilledOrdersBySecuritiesAccount($secIdent);
    }

    /**
     * @param $secIdent
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\SecurityOrder[]
     */
    public function getUnfilledOTCOrdersForSecuritiesAccount($secIdent)
    {
        return $this->getSecurityOrderController()->getUnfilledOTCOrdersForSecuritiesAccount($secIdent);
    }

    /**
     * @param $orderId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function deleteOrder($orderId){
        return $this->getSecurityOrderController()->deleteOrder($orderId);
    }

    /**
     * @param $secAccId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function deleteAllOrders($secAccId){
        return $this->getSecurityOrderController()->deleteAllOrders($secAccId);
    }

    /**
     * @return SecurityOrderController
     */
    public function getSecurityOrderController()
    {
        return new SecurityOrderController($this->config, $this->jwt);
    }
}
