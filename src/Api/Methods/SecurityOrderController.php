<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;

/**
 * Class SecurityOrderController
 *
 * @package Alphatrader\ApiBundle\Api\Methods
 */
class SecurityOrderController extends ApiClient
{
    /**
     * @param $secIdent
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\OrderBook
     */
    public function getOrderbook($secIdent)
    {
        $data = $this->get('orderbook/'.$secIdent);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\OrderBook');
    }

    /**
     * @param $secIdent
     * @param $secAccId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\SecurityOrder[]
     */
    public function getOrderList($secIdent, $secAccId)
    {
        $data = $this->get('orderlist/'.$secIdent, ['securitiesAccountId' => $secAccId]);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\SecurityOrder>');
    }

    /**
     * @param $secIdent
     *
     * @return \Alphatrader\ApiBundle\Model\SecurityOrder|\Alphatrader\ApiBundle\Model\Error
     */
    public function getSecurityOrder($secIdent)
    {
        $data = $this->get('securityorders/'. $secIdent);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\SecurityOrder');
    }

    /**
     * @param $secAccId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\SecurityOrder[]
     */
    public function getUnfilledOTCOrdersForSecuritiesAccount($secAccId)
    {
        $data = $this->get('securityorders/counterparty/'.$secAccId);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\SecurityOrder>');
    }

    /**
     * @param $secAccId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\SecurityOrder[]
     */
    public function getUnfilledOTCOrdersBySecuritiesAccount($secAccId)
    {
        $data = $this->get('securityorders/securitiesaccount/'.$secAccId);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\SecurityOrder>');
    }

    /**
     * @param $secAccId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function deleteAllOrders($secAccId)
    {
        $data = $this->delete('securityorders/', ['owner' => $secAccId]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Message');
    }

    /**
     * @param $orderId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function deleteOrder($orderId)
    {
        $data = $this->delete('securityorders/'.$orderId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Message');
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
     * @return \Alphatrader\ApiBundle\Model\SecurityOrder|\Alphatrader\ApiBundle\Model\Error
     */
    public function createSecurityOrder($owner, $secIdent, $action, $type, $price, $numberOfShares, $counterparty)
    {

        $data = $this->post(
            'securityorders/',
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
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\SecurityOrder');
    }

    /**
     * @param $owner
     * @param $secIdent
     * @param $numberOfShares
     * @param $price
     *
     * @return \Alphatrader\ApiBundle\Model\OrderCheck|\Alphatrader\ApiBundle\Model\Error
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
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\OrderCheck');
    }
}
