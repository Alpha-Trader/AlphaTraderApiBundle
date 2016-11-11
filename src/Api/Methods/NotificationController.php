<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;

/**
 * Class NotificationsController
 *
 * @package AlphaTrader\API\Controller
 * @author  Tr0nYx <tronyx@bric.finance>
 */
class NotificationController extends ApiClient
{
    /**
     * @return \Alphatrader\ApiBundle\Model\Notifications[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getNotifications()
    {
        $data = $this->get('notifications/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Notifications>');
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Notifications[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getUnreadNotifications()
    {
        $data = $this->get('notifications/unread/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Notifications>');
    }
    
    /**
     * @return mixed
     */
    public function markAsRead()
    {
        $this->put('notifications/read/');
    }
}
