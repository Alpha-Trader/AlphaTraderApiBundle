<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Message
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Message
{
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("chatId")
     */
    private $chatId;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("content")
     */
    private $content;

    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("dateSent")
     */
    private $dateSent;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @var bool
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("read")
     */
    private $read;

    /**
     * @var UserName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     * @Annotation\SerializedName("sender")
     */
    private $sender;

    /**
     * @return string
     */
    public function getChatId()
    {
        return $this->chatId;
    }

    /**
     * @param string $chatId
     */
    public function setChatId($chatId)
    {
        $this->chatId = $chatId;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getDateSent()
    {
        return $this->dateSent;
    }

    /**
     * @param int $dateSent
     */
    public function setDateSent($dateSent)
    {
        $this->dateSent = $dateSent;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return boolean
     */
    public function isRead()
    {
        return $this->read;
    }

    /**
     * @param boolean $read
     */
    public function setRead($read)
    {
        $this->read = $read;
    }

    /**
     * @return UserName
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param UserName $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }
}
