<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class FixedIncomeSecurity
 *
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class FixedIncomeSecurity
{
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("faceValue")
     */
    private $faceValue;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("interestRate")
     */
    private $interestRate;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("issueDate")
     */
    private $issueDate;

    /**
     * @var Listing
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Listing")
     * @Annotation\SerializedName("listing")
     */
    private $listing;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("maturityDate")
     */
    private $maturityDate;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("name")
     */
    private $string;

    /**
     * @var PriceSpread
     * @Annotation\Type("Alphatrader\ApiBundle\Model\PriceSpread")
     * @Annotation\SerializedName("priceSpread")
     */
    private $priceSpread;

    /**
     * @var Listing
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Listing")
     * @Annotation\SerializedName("repurchaseListing")
     */
    private $repurchaseListing;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("volume")
     */
    private $volume;

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
     * @return float
     */
    public function getFaceValue()
    {
        return $this->faceValue;
    }

    /**
     * @param float $faceValue
     */
    public function setFaceValue($faceValue)
    {
        $this->faceValue = $faceValue;
    }

    /**
     * @return float
     */
    public function getInterestRate()
    {
        return $this->interestRate;
    }

    /**
     * @param float $interestRate
     */
    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
    }

    /**
     * @return int
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * @param int $issueDate
     */
    public function setIssueDate($issueDate)
    {
        $this->issueDate = $issueDate;
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
     * @return int
     */
    public function getMaturityDate()
    {
        return $this->maturityDate;
    }

    /**
     * @param int $maturityDate
     */
    public function setMaturityDate($maturityDate)
    {
        $this->maturityDate = $maturityDate;
    }

    /**
     * @return string
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * @param string $string
     */
    public function setString($string)
    {
        $this->string = $string;
    }

    /**
     * @return PriceSpread
     */
    public function getPriceSpread()
    {
        return $this->priceSpread;
    }

    /**
     * @param PriceSpread $priceSpread
     */
    public function setPriceSpread($priceSpread)
    {
        $this->priceSpread = $priceSpread;
    }

    /**
     * @return Listing
     */
    public function getRepurchaseListing()
    {
        return $this->repurchaseListing;
    }

    /**
     * @param Listing $repurchaseListing
     */
    public function setRepurchaseListing($repurchaseListing)
    {
        $this->repurchaseListing = $repurchaseListing;
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
