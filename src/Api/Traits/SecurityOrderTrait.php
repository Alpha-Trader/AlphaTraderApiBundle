<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\SecurityOrderController;

/**
 * Class SecurityOrderTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
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
    public function createOrder($owner, $secIdent, $action, $type, $price, $numberOfShares, $counterparty)
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
    public function checkOrder($owner,$securityIdentifier,$numberOfShares,$price)
    {
        return $this->getSecurityOrderController()->checkSecurityOrder(
            $owner,
            $securityIdentifier,
            $numberOfShares,
            $price
        );
    }

    /**
     * @return SecurityOrderController
     */
    public function getSecurityOrderController()
    {
        return new SecurityOrderController($this->config, $this->jwt);
    }
}
