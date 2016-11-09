<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\ChatController;
use Alphatrader\ApiBundle\Model\Chat;
use Alphatrader\ApiBundle\Model\UserAccount;

/**
 * Class ChatTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  Tr0nYx
 */
trait ChatTrait
{
    /**
     * @return \Alphatrader\ApiBundle\Model\Chat[]
     */
    public function getChats()
    {
        return $this->getChatController()->getChats();
    }

    /**
     * @param int $chatID
     *
     * @return \Alphatrader\ApiBundle\Model\Chat
     */
    public function getChat($chatID)
    {
        return $this->getChatController()->getChat($chatID);
    }

    /**
     * @param Chat        $chat
     * @param UserAccount $user
     *
     * @return Chat|\Alphatrader\ApiBundle\Model\Error
     */
    public function addUsertoChat(Chat $chat, UserAccount $user)
    {
        return $this->getChatController()->addUsertoChatbyUserId($chat, $user);
    }

    /**
     * @param Chat     $chat
     * @param      $username
     *
     * @return Chat|\Alphatrader\ApiBundle\Model\Error
     */
    public function addUsertoChatbyUsername(Chat $chat, $username)
    {
        return $this->getChatController()->addUsertoChatbyUserId($chat, $username);
    }

    /**
     * @param $iChatId
     *
     * @return Chat
     */
    public function quitChat($iChatId)
    {
        return $this->getChatController()->quitChat($iChatId);
    }

    /**
     * @param $iChatId
     *
     * @return Chat
     */
    public function markasread($iChatId)
    {
        return $this->getChatController()->markasread($iChatId);
    }

    /**
     * @param Chat        $chat
     * @param UserAccount $user
     *
     * @return Chat
     */
    public function removeUser(Chat $chat, UserAccount $user)
    {
        return $this->getChatController()->removeUser($chat, $user);
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\CompactChat|\Alphatrader\ApiBundle\Model\Error
     */
    public function getUnreadChats()
    {
        return $this->getChatController()->getUnreadChats();
    }

    /**
     * @param Chat $chat
     *
     * @return \Alphatrader\ApiBundle\Model\CompactChat|\Alphatrader\ApiBundle\Model\Error
     */
    public function getUnreadChatsByChat(Chat $chat)
    {
        return $this->getChatController()->getUnreadChats($chat);
    }
    
    /**
     * @return ChatController
     */
    public function getChatController()
    {
        return new ChatController($this->config, $this->jwt);
    }
}
