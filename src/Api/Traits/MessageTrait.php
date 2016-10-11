<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\MessageController;
use Alphatrader\ApiBundle\Model\Chat;

/**
 * Class MessageTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait MessageTrait
{
    /**
     * @param                                   $content
     * @param \Alphatrader\ApiBundle\Model\Chat $chat
     *
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function sendMessage($content, Chat $chat)
    {
        return $this->getMessageController()->sendMessage($content, $chat->getId());
    }

    /**
     * @param $messageId
     *
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function readMessage($messageId)
    {
        return $this->getMessageController()->readMessage($messageId);
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message[]
     */
    public function getUnreadMessages()
    {
        return $this->getMessageController()->getUnreadMessages();
    }

    /**
     * @param $messageId
     *
     * @return \Alphatrader\ApiBundle\Model\Error
     */
    public function deleteMessage($messageId)
    {
        return $this->getMessageController()->deleteMessage($messageId);
    }

    /**
     * @param $messageId
     *
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function getMessage($messageId)
    {
        return $this->getMessageController()->getMessage($messageId);
    }

    /**
     * @param Chat $chat
     *
     * @return \Alphatrader\ApiBundle\Model\Error|mixed
     */
    public function getMessagesFromChat(Chat $chat)
    {
        return $this->getMessageController()->getMessagesFromChat($chat->getId());
    }

    /**
     * @return MessageController
     */
    public function getMessageController()
    {
        return new MessageController($this->config, $this->jwt);
    }
}
