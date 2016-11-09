<?php

namespace Alphatrader\ApiBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation;

/**
 * Class LastMessage
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class LastMessage
{
    /**
     * @Annotation\Type("string")
     */
    protected $id;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("chatId")
     */
    protected $chatId;

    /**
     * @Annotation\Type("string")
     */
    protected $content;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("dateSent")
     */
    protected $dateSent;

    /**
     * @var UserName[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\UserName>")
     */
    protected $participants;

    /**
     * @var bool
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("read")
     */
    protected $read;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     */
    protected $sender;

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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return ArrayCollection<UserName>
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @param UserName[] $participants
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
    }

    /**
     * @return bool
     */
    public function isRead()
    {
        return $this->read;
    }

    /**
     * @param bool $read
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

    /**
     * @SuppressWarnings("unused")
     * @Annotation\PostDeserialize
     */
    private function afterDeserialization()
    {
        if ($this->dateSent !== null) {
            $date = substr($this->dateSent, 0, 10) . '.' . substr($this->dateSent, 10);
            $micro = sprintf("%06d", ($date - floor($date)) * 1000000);
            $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $date));
            $this->dateSent = $date;
        }
    }
}
