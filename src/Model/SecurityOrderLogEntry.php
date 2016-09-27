<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class SecurityOrderLogEntry
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class SecurityOrderLogEntry
{
    use DateTrait;
    
    /**
     * @Annotation\Type("string")
     */
    protected $id;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("buyerSecuritiesAccount")
     */
    protected $buyerSecAcc;

    /**
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfShares")
     */
    protected $numberOfShares;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("price")
     */
    protected $price;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("securityIdentifier")
     */
    protected $securityIdentifier;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("sellerSecuritiesAccount")
     */
    protected $sellerSecAcc;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("volume")
     */
    protected $volume;

    /**
     * @return mixed
     */
    public function getBuyerSecuritiesAccount()
    {
        return $this->buyerSecAcc;
    }

    /**
     * @param mixed $buyerSecAcc
     */
    public function setBuyerSecuritiesAccount($buyerSecAcc)
    {
        $this->buyerSecAcc = $buyerSecAcc;
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
     * @return mixed
     */
    public function getNumberOfShares()
    {
        return $this->numberOfShares;
    }

    /**
     * @param mixed $numberOfShares
     */
    public function setNumberOfShares($numberOfShares)
    {
        $this->numberOfShares = $numberOfShares;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
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

    /**
     * @return mixed
     */
    public function getSellerSecuritiesAccount()
    {
        return $this->sellerSecAcc;
    }

    /**
     * @param mixed $sellerSecAcc
     */
    public function setSellerSecuritiesAccount($sellerSecAcc)
    {
        $this->sellerSecAcc = $sellerSecAcc;
    }

    /**
     * @return mixed
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param mixed $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }
}
