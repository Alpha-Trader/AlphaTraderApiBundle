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
        $data = $this->get('notifications/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Notifications>');
    }

    /**
     * @return Notifications[]|Error
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
