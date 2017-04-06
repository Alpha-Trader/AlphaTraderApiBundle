<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

class SecurityOrder
{

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $counterPartyName;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("ownerName")
     */
    protected $ownerName;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("creationDate")
     */
    protected $creationDate;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("securityIdentifier")
     */
    protected $securityIdentifier;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("committedCash")
     */
    protected $committedCash;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $action;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfShares")
     */
    protected $numberOfShares;

    /**
     * @var Listing
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Listing")
     */
    protected $listing;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("counterParty")
     */
    protected $counterParty;

    /**
     * @var float
     * @Annotation\Type("float")
     */
    protected $price;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $owner;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $id;

    /**
     * @var string
     * @Annotation\Type("string")
     */
    protected $type;
    /**
     * @var float
     * @Annotation\Type("float")
     */
    protected $volume;
    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return float
     */
    public function getCommittedCash()
    {
        return $this->committedCash;
    }

    /**
     * @param float $committedCash
     */
    public function setCommittedCash($committedCash)
    {
        $this->committedCash = $committedCash;
    }

    /**
     * @return string
     */
    public function getCounterParty()
    {
        return $this->counterParty;
    }

    /**
     * @param string $counterParty
     */
    public function setCounterParty($counterParty)
    {
        $this->counterParty = $counterParty;
    }

    /**
     * @return string
     */
    public function getCounterPartyName()
    {
        return $this->counterPartyName;
    }

    /**
     * @param string $counterPartyName
     */
    public function setCounterPartyName($counterPartyName)
    {
        $this->counterPartyName = $counterPartyName;
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
     * @return integer
     */
    public function getNumberOfShares()
    {
        return $this->numberOfShares;
    }

    /**
     * @param integer $numberOfShares
     */
    public function setNumberOfShares($numberOfShares)
    {
        $this->numberOfShares = $numberOfShares;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

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
    public function getOwnerName()
    {
        return $this->ownerName;
    }

    /**
     * @param string $ownerName
     */
    public function setOwnerName($ownerName)
    {
        $this->ownerName = $ownerName;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return float
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param float $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }
}
