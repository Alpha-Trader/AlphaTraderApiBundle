<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Notifications
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Notifications
{
    use DateTrait;
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\MessagePrototype")
     * @Annotation\SerializedName("content")
     */
    private $content;

    /**
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("readByReceiver")
     */
    private $readByReceiver;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     * @Annotation\SerializedName("receiver")
     */
    private $receiver;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\MessagePrototype")
     * @Annotation\SerializedName("subject")
     */
    private $subject;

    /**
     * @return MessagePrototype
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return UserName
     */
    public function getReadByReceiver()
    {
        return $this->readByReceiver;
    }

    /**
     * @param mixed $readByReceiver
     */
    public function setReadByReceiver($readByReceiver)
    {
        $this->readByReceiver = $readByReceiver;
    }

    /**
     * @return mixed
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param mixed $receiver
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * @return MessagePrototype
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
}
