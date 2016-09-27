<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class MessagePrototype
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class MessagePrototype
{
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("filledString")
     */
    private $filledString;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("message")
     */
    private $message;

    /**
     * @Annotation\Type("ArrayCollection<string>")
     * @Annotation\SerializedName("substitutions")
     */
    private $substitutions;

    /**
     * @return mixed
     */
    public function getFilledString()
    {
        return $this->filledString;
    }

    /**
     * @param mixed $filledString
     */
    public function setFilledString($filledString)
    {
        $this->filledString = $filledString;
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
     * @return mixed
     */
    public function getSubstitutions()
    {
        return $this->substitutions;
    }

    /**
     * @param mixed $substitutions
     */
    public function setSubstitutions($substitutions)
    {
        $this->substitutions = $substitutions;
    }
}
