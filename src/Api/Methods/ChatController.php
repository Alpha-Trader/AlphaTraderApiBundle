<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\Chats;
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
     * @return Chats[]
     */
    public function getChats()
    {
        $data = $this->request('chats');
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\Chats>',
            'json'
        );
        return $oResult;
    }

    /**
     * @param Chats       $iChat
     * @param UserAccount $user
     *
     * @return mixed
     */
    public function addUsertoChatbyId(Chats $iChat, UserAccount $user)
    {
        $data = $this->put('chats/adduser/userid', ['userId' => $user->getId(), 'chatId' => $iChat->getId()]);
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\Chats', 'json');
        return $oResult;
    }

    /**
     * Adds user to chat
     *
     * @param int $iChatId
     * @param int $username
     * @Method("PUT")
     */
    public function addUsertoChatbyUsername($iChatId, $username)
    {
    }

    /**
     * Sets a chat as read by logged in user
     *
     * @param int $iChatId
     * @Method("PUT")
     */
    public function markasread($iChatId)
    {
    }

    /**
     * Removes logged in user from chat
     *
     * @param int $iChatId
     * @Method("PUT")
     */
    public function removeUser($iChatId)
    {
    }

    /**
     * Returns chats with unread messages
     * @Method("GET")
     */
    public function getUnreadChats()
    {
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
     * @return Chats
     */
    public function getChat($iChat)
    {
        $data = $this->get('chats/' . $iChat);
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\Chats', 'json');
        return $oResult;
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
