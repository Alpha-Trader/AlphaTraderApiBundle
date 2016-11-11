<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class HashTag
 * @package Alphatrader\ApiBundle\Model
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class HashTag
{
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;
    
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("tag")
     */
    private $tag;

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
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }
    
    
}