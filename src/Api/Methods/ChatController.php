<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\Chat;
use Alphatrader\ApiBundle\Model\CompactChat;
use Alphatrader\ApiBundle\Model\UserAccount;

/**
 * Class ChatController
 * @package AlphaTrader\ApiBundle\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 * @SuppressWarnings(PHPMD)
 */
class ChatController extends ApiClient
{
    /**
     * Lists chats in which logged in user participates
     * @Method("GET")
     * @return Chat[]
     */
    public function getChats()
    {
        $request = $this->get('chats');
        return $this->parseResponse($request,'ArrayCollection<Alphatrader\ApiBundle\Model\Chat>');
    }

    /**
     * @param Chat       $iChat
     * @param UserAccount $user
     *
     * @return \Alphatrader\ApiBundle\Model\Chat|\Alphatrader\ApiBundle\Model\Error
     */
    public function addUsertoChatbyUserId(Chat $iChat, UserAccount $user)
    {
        $request = $this->put('chats/adduser/userid', ['userId' => $user->getId(), 'chatId' => $iChat->getId()]);
        return $this->parseResponse($request,'Alphatrader\ApiBundle\Model\Chat');
    }

    /**
     * @param Chat $iChat
     * @param       $username
     *
     * @return \Alphatrader\ApiBundle\Model\Chat|\Alphatrader\ApiBundle\Model\Error
     */
    public function addUsertoChatbyUsername(Chat $iChat, $username)
    {
        $request = $this->put('chats/adduser/username', ['userId' => $username, 'chatId' => $iChat->getId()]);
        return $this->parseResponse($request,'Alphatrader\ApiBundle\Model\Chat');
    }

    /**
     * Quits chat
     *
     * @param int $iChatId
     *
     * @return \Alphatrader\ApiBundle\Model\Chat
     * @Method("PUT")
     */
    public function quitChat($iChatId)
    {
        $request = $this->put('chats/quitchat/'.$iChatId);
        return $this->parseResponse($request,'Alphatrader\ApiBundle\Model\Chat');
    }

    /**
     * Sets a chat as read by logged in user
     *
     * @param int $iChatId
     *
     * @return \Alphatrader\ApiBundle\Model\Chat
     * @Method("PUT")
     */
    public function markasread($iChatId)
    {
        $request = $this->put('chats/read/', ['chatId'=> $iChatId]);
        return $this->parseResponse($request,'Alphatrader\ApiBundle\Model\Chat');
    }

    /**
     * Removes logged in user from chat
     *
     * @param \Alphatrader\ApiBundle\Model\Chat        $iChat
     * @param \Alphatrader\ApiBundle\Model\UserAccount $user
     *
     * @Method("PUT")
     * @return \Alphatrader\ApiBundle\Model\Chat|\Alphatrader\ApiBundle\Model\Error
     */
    public function removeUser(Chat $iChat, UserAccount $user)
    {
        $request = $this->put('chats/removeuser', ['userId' => $user->getId(), 'chatId' => $iChat->getId()]);
        return $this->parseResponse($request,'Alphatrader\ApiBundle\Model\Chat');
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\CompactChat|\Alphatrader\ApiBundle\Model\Error
     */
    public function getUnreadChats()
    {
        $data = $this->get('chats/unread');
        return $this->parseResponse($data,'ArrayCollection<Alphatrader\ApiBundle\Model\CompactChat>');
    }

    /**
     * Creates a new chat
     * @Method("POST")
     */
    public function createNewChatbyUserIds($sChatName, $aUserIds, $bReadOnly)
    {
    }

    /**
     * Creates a new chat
     * @Method("POST")
     */
    public function createNewChatbyUserNames($sChatName, $aUserNames, $bReadOnly)
    {
    }

    /**
     * Deletes chat
     *
     * @param int $iChatId
     * @Method("DELETE")
     */
    public function deleteChat($iChatId)
    {
    }

    /**
     * Returns chat
     *
     * @param int $iChat
     * @Method("GET")
     *
     * @return \Alphatrader\ApiBundle\Model\Chats
     */
    public function getChat($iChat)
    {
        $data = $this->get('chats/' . $iChat);
        return $this->parseResponse($data,'Alphatrader\ApiBundle\Model\Chats');
    }

    /**
     * Change chat properties
     *
     * @param int $iChatId
     * @Method("PUT")
     */
    public function changeChatProperties($iChatId)
    {
    }
}
