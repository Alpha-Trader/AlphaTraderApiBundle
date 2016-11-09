<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Listing
 *
 * @package                            Alphatrader\ApiBundle\Model
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
     * @Annotation\Type("string")
     * @Annotation\SerializedName("name")
     */
    private $name;

    /**
     * @return string
     */
    public function getSecurityIdentifier()
    {
        return $this->securityIdentifier;
    }

    /**
     * @param string $securityIdentifier
     */
    public function setSecurityIdentifier($securityIdentifier)
    {
        $this->securityIdentifier = $securityIdentifier;
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
