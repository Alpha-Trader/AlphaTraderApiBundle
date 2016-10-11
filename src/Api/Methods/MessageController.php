<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;

/**
 * Class MessageController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class MessageController extends ApiClient
{
    /**
     * @param $content
     * @param $chatId
     *
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function sendMessage($content, $chatId)
    {
        $data = $this->post('messages', ['content' => $content, 'chatId' => $chatId]);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Message');
    }

    /**
     * @param $messageId
     *
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function readMessage($messageId)
    {
        $data = $this->put('messages/read', ['messageId' => $messageId]);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Message');
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message[]
     */
    public function getUnreadMessages()
    {
        $data = $this->get('messages/unread');

        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Message>');
    }

    /**
     * @param $messageId
     *
     * @return \Alphatrader\ApiBundle\Model\Error
     */
    public function deleteMessage($messageId)
    {
        $data = $this->delete('messages/', ['messageId' => $messageId]);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Error');
    }

    /**
     * @param $messageId
     *
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function getMessage($messageId)
    {
        $data = $this->get('messages/', ['messageId' => $messageId]);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Message');
    }

    /**
     * @param $chatId
     *
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message[]
     */
    public function getMessagesFromChat($chatId)
    {
        $data = $this->get('messages/chat/', ['chatId' => $chatId]);

        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Message>');
    }
}
