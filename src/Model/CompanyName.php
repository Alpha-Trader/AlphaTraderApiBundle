<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class CompanyName
 *
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class CompanyName
{
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    protected $id;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Listing")
     * @Annotation\SerializedName("listing")
     */
    protected $listing;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("name")
     */
    protected $name;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("securityIdentifier")
     */
    protected $securityIdentifier;

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
     * @return Listing
     */
    public function getListing()
    {
        return $this->listing;
    }

    /**
     * @param Listing $listing
     */
    public function setListing($listing)
    {
        $this->listing = $listing;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

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
}
