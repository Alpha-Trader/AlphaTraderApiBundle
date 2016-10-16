<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * trait PriceSpreadTrait
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
trait PriceSpreadTrait
{
    use DateTrait;
    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("askPrice")
     */
    private $askPrice;

    /**
     * @var float
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("askSize")
     */
    private $askSize;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("bidPrice")
     */
    private $bidPrice;

    /**
     * @var float
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("bidSize")
     */
    private $bidSize;

    /**
     * @var SecurityPrice
     * @Annotation\Type("Alphatrader\ApiBundle\Model\SecurityPrice")
     * @Annotation\SerializedName("lastPrice")
     */
    private $lastPrice;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("maxBidPrice")
     */
    private $maxBidPrice;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("minAskPrice")
     */
    private $minAskPrice;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("spreadAbs")
     */
    private $spreadAbs;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("spreadPercent")
     */
    private $spreadPercent;

    /**
     * @return float
     */
    public function getAskPrice()
    {
        return $this->askPrice;
    }

    /**
     * @param float $askPrice
     */
    public function setAskPrice($askPrice)
    {
        $this->askPrice = $askPrice;
    }

    /**
     * @return float
     */
    public function getAskSize()
    {
        return $this->askSize;
    }

    /**
     * @param float $askSize
     */
    public function setAskSize($askSize)
    {
        $this->askSize = $askSize;
    }

    /**
     * @return float
     */
    public function getBidPrice()
    {
        return $this->bidPrice;
    }

    /**
     * @param float $bidPrice
     */
    public function setBidPrice($bidPrice)
    {
        $this->bidPrice = $bidPrice;
    }

    /**
     * @return float
     */
    public function getBidSize()
    {
        return $this->bidSize;
    }

    /**
     * @param float $bidSize
     */
    public function setBidSize($bidSize)
    {
        $this->bidSize = $bidSize;
    }

    /**
     * @return float
     */
    public function getSpreadAbs()
    {
        return $this->spreadAbs;
    }

    /**
     * @param float $spreadAbs
     */
    public function setSpreadAbs($spreadAbs)
    {
        $this->spreadAbs = $spreadAbs;
    }

    /**
     * @return float
     */
    public function getSpreadPercent()
    {
        return $this->spreadPercent;
    }

    /**
     * @param float $spreadPercent
     */
    public function setSpreadPercent($spreadPercent)
    {
        $this->spreadPercent = $spreadPercent;
    }

    /**
     * @return SecurityPrice
     */
    public function getLastPrice()
    {
        return $this->lastPrice;
    }

    /**
     * @param SecurityPrice $lastPrice
     */
    public function setLastPrice($lastPrice)
    {
        $this->lastPrice = $lastPrice;
    }

    /**
     * @return float
     */
    public function getMaxBidPrice()
    {
        return $this->maxBidPrice;
    }

    /**
     * @param float $maxBidPrice
     */
    public function setMaxBidPrice($maxBidPrice)
    {
        $this->maxBidPrice = $maxBidPrice;
    }

    /**
     * @return float
     */
    public function getMinAskPrice()
    {
        return $this->minAskPrice;
    }

    /**
     * @param float $minAskPrice
     */
    public function setMinAskPrice($minAskPrice)
    {
        $this->minAskPrice = $minAskPrice;
    }
}
