<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class OrderBook
 *
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class OrderBook
{
    /**
     * @var OrderBookEntry[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\OrderBookEntry>")
     * @Annotation\SerializedName("buyEntries")
     */
    private $buyEntries;
    
    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("maxBuySize")
     */
    private $maxBuySize;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("maxSellSize")
     */
    private $maxSellSize;

    /**
     * @var OrderBookEntry[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\OrderBookEntry>")
     * @Annotation\SerializedName("sellEntries")
     */
    private $sellEntries;

    /**
     * @return OrderBookEntry[]
     */
    public function getBuyEntries()
    {
        return $this->buyEntries;
    }

    /**
     * @param OrderBookEntry[] $buyEntries
     */
    public function setBuyEntries($buyEntries)
    {
        $this->buyEntries = $buyEntries;
    }

    /**
     * @return int
     */
    public function getMaxBuySize()
    {
        return $this->maxBuySize;
    }

    /**
     * @param int $maxBuySize
     */
    public function setMaxBuySize($maxBuySize)
    {
        $this->maxBuySize = $maxBuySize;
    }

    /**
     * @return int
     */
    public function getMaxSellSize()
    {
        return $this->maxSellSize;
    }

    /**
     * @param int $maxSellSize
     */
    public function setMaxSellSize($maxSellSize)
    {
        $this->maxSellSize = $maxSellSize;
    }

    /**
     * @return OrderBookEntry[]
     */
    public function getSellEntries()
    {
        return $this->sellEntries;
    }

    /**
     * @param OrderBookEntry[] $sellEntries
     */
    public function setSellEntries($sellEntries)
    {
        $this->sellEntries = $sellEntries;
    }
}
