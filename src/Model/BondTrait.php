<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class BondTrait
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
trait BondTrait
{
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("faceValue")
     */
    private $faceValue;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("interestRate")
     */
    private $interestRate;

    /**
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("issueDate")
     */
    private $issueDate;

    /**
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("maturityDate")
     */
    private $maturityDate;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("name")
     */
    private $name;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Listing")
     * @Annotation\SerializedName("repurchaseListing")
     */
    private $repurchaseListing;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\PriceSpread")
     * @Annotation\SerializedName("priceSpread")
     */
    private $priceSpread;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Listing")
     * @Annotation\SerializedName("listing")
     */
    private $listing;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("volume")
     */
    private $volume;

    /**
     * @return mixed
     */
    public function getFaceValue()
    {
        return $this->faceValue;
    }

    /**
     * @param mixed $faceValue
     */
    public function setFaceValue($faceValue)
    {
        $this->faceValue = $faceValue;
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
    public function getInterestRate()
    {
        return $this->interestRate;
    }

    /**
     * @param mixed $interestRate
     */
    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
    }

    /**
     * @return mixed
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * @param mixed $issueDate
     */
    public function setIssueDate($issueDate)
    {
        $this->issueDate = $issueDate;
    }

    /**
     * @return mixed
     */
    public function getMaturityDate()
    {
        return $this->maturityDate;
    }

    /**
     * @param mixed $maturityDate
     */
    public function setMaturityDate($maturityDate)
    {
        $this->maturityDate = $maturityDate;
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
     * @SuppressWarnings("unused")
     * @Annotation\PostDeserialize
     */
    private function afterDeserialization()
    {
        if ($this->issueDate != null) {
            $startdate = substr($this->issueDate, 0, 10) . '.' . substr($this->issueDate, 10);
            $micro = sprintf("%06d", ($startdate - floor($startdate)) * 1000000);
            $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $startdate));
            $this->issueDate = $date;
        }

        if ($this->maturityDate != null) {
            $enddate = substr($this->maturityDate, 0, 10) . '.' . substr($this->maturityDate, 10);
            $micro = sprintf("%06d", ($enddate - floor($enddate)) * 1000000);
            $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $enddate));
            $this->maturityDate = $date;
        }
    }
}
