<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class CompactChat
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class CompactChat
{
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("chatName")
     */
    private $chatName;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("dateCreated")
     */
    private $dateCreated;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @var Message
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Message")
     * @Annotation\SerializedName("lastMessage")
     */
    private $lastMessage;

    /**
     * @var UserName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     * @Annotation\SerializedName("owner")
     */
    private $owner;

    /**
     * @var bool
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("readonly")
     */
    private $readonly;

    /**
     * @return string
     */
    public function getChatName()
    {
        return $this->chatName;
    }

    /**
     * @param string $chatName
     */
    public function setChatName($chatName)
    {
        $this->chatName = $chatName;
    }

    /**
     * @return int
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param int $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
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
     * @return Message
     */
    public function getLastMessage()
    {
        return $this->lastMessage;
    }

    /**
     * @param Message $lastMessage
     */
    public function setLastMessage($lastMessage)
    {
        $this->lastMessage = $lastMessage;
    }

    /**
     * @return UserName
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param UserName $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return boolean
     */
    public function isReadonly()
    {
        return $this->readonly;
    }

    /**
     * @param boolean $readonly
     */
    public function setReadonly($readonly)
    {
        $this->readonly = $readonly;
    }
}
