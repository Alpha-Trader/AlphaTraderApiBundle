<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\ChatController;

/**
 * Class ChatTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait ChatTrait
{
    /**
     * @return \Alphatrader\ApiBundle\Model\Chats[]
     */
    public function getChats()
    {
        return $this->getChatController()->getChats();
    }

    /**
     * @param int $chatID
     *
     * @return \Alphatrader\ApiBundle\Model\Chats
     */
    public function getChat($chatID)
    {
        return $this->getChatController()->getChat($chatID);
    }
    
    /**
     * @return ChatController
     */
    public function getChatController()
    {
        return new ChatController($this->config, $this->jwt);
    }
}
