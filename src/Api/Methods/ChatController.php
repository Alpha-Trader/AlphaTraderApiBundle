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
        $data = $this->request('chats');
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\Chat>',
            'json'
        );
        if (!is_array($oResult)) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param Chat       $iChat
     * @param UserAccount $user
     *
     * @return \Alphatrader\ApiBundle\Model\Chat|\Alphatrader\ApiBundle\Model\Error
     */
    public function addUsertoChatbyUserId(Chat $iChat, UserAccount $user)
    {
        $data = $this->put('chats/adduser/userid', ['userId' => $user->getId(), 'chatId' => $iChat->getId()]);
        /** @var Chat $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\Chat', 'json');
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param Chat $iChat
     * @param       $username
     *
     * @return \Alphatrader\ApiBundle\Model\Chat|\Alphatrader\ApiBundle\Model\Error
     */
    public function addUsertoChatbyUsername(Chat $iChat, $username)
    {
        $data = $this->put('chats/adduser/username', ['userId' => $username, 'chatId' => $iChat->getId()]);
        /** @var Chat $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\Chat', 'json');
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
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
        $data = $this->put('chats/quitchat/'.$iChatId);
        /** @var Chat $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\Chat', 'json');
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
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
        $data = $this->put('chats/read/', ['chatId'=> $iChatId]);
        /** @var Chat $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\Chat', 'json');
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
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
        $data = $this->put('chats/removeuser', ['userId' => $user->getId(), 'chatId' => $iChat->getId()]);
        /** @var Chat $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\Chat', 'json');
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\CompactChat|\Alphatrader\ApiBundle\Model\Error
     */
    public function getUnreadChats()
    {
        $data = $this->get('chats/unread');
        /** @var CompactChat $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\CompactChat>',
            'json'
        );
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
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
