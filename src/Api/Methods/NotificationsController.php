<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\Error;
use Alphatrader\ApiBundle\Model\Notifications;

/**
 * Class NotificationsController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class NotificationsController extends ApiClient
{
    /**
     * @return Notifications[]|Error
     */
    public function getNotifications()
    {
        $data = $this->request('notifications/');
        /** @var Notifications[] $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\Notifications>',
            'json'
        );
        if (empty($oResult) && !isset($oResult[0])) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @return Notifications[]|Error
     */
    public function getUnreadNotifications()
    {
        $data = $this->request('notifications/unread/');
        /** @var Notifications[] $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\Notifications>',
            'json'
        );
        if (empty($oResult) && !isset($oResult[0])) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }
    
    /**
     * @return mixed
     */
    public function markAsRead()
    {
        $this->put('notifications/read/');
    }
}
