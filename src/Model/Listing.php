<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Listing
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Listing
{
    use DateTrait;
    
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("securityIdentifier")
     */
    private $securityIdentifier;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("type")
     */
    private $type;

    /**
     * @return mixed
     */
    public function getSecurityIdentifier()
    {
        return $this->securityIdentifier;
    }

    /**
     * @param mixed $securityIdentifier
     */
    public function setSecurityIdentifier($securityIdentifier)
    {
        $this->securityIdentifier = $securityIdentifier;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
