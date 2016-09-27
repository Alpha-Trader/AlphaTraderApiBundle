<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Events
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Events
{
    use DateTrait;
    /**
     * @var object
     * @Annotation\Type("array")
     */
    private $content;

    /**
     * @var
     * @Annotation\Type("array<string>")
     */
    private $realms;
    /**
     * @var string
     * @Annotation\Type("string")
     */
    private $type;

    /**
     * @return object
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param object $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return array
     */
    public function getRealms()
    {
        return $this->realms;
    }

    /**
     * @param mixed $realms
     */
    public function setRealms($realms)
    {
        $this->realms = $realms;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
