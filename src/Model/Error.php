<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Error
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Error
{
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("code")
     */
    protected $code;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("message")
     */
    protected $message;
    
    /**
     * @var string
     * @Annotation\Type("Alphatrader\ApiBundle\Model\MessagePrototype")
     * @Annotation\SerializedName("messagePrototype")
     */
    protected $messagePrototype;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return MessagePrototype
     */
    public function getMessagePrototype()
    {
        return $this->messagePrototype;
    }

    /**
     * @param MessagePrototype $messagePrototype
     */
    public function setMessagePrototype($messagePrototype)
    {
        $this->messagePrototype = $messagePrototype;
    }
}
