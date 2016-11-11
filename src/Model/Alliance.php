<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Alliance
 *
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class Alliance
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
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("messageBoard")
     */
    private $messageBoard;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("name")
     */
    private $name;

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
     * @return string
     */
    public function getMessageBoard()
    {
        return $this->messageBoard;
    }

    /**
     * @param string $messageBoard
     */
    public function setMessageBoard($messageBoard)
    {
        $this->messageBoard = $messageBoard;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    
}