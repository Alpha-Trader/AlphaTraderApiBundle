<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class PortfolioPosition
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class PortfolioPosition
{
    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("committedShares")
     */
    private $committedShares;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("currentAskPrice")
     */
    private $currentAskPrice;

    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("currentAskSize")
     */
    private $currentAskSize;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("currentBidPrice")
     */
    private $currentBidPrice;

    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("currentBidSize")
     */
    private $currentBidSize;

    /**
     * @var SecurityPrice
     * @Annotation\Type("Alphatrader\ApiBundle\Model\SecurityPrice")
     * @Annotation\SerializedName("lastPrice")
     */
    private $lastPrice;

    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfShares")
     */
    private $numberOfShares;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("securityIdentifier")
     */
    private $securityIdentifier;

    /**
     * @return int
     */
    public function getCommittedShares()
    {
        return $this->committedShares;
    }

    /**
     * @param int $committedShares
     */
    public function setCommittedShares($committedShares)
    {
        $this->committedShares = $committedShares;
    }

    /**
     * @return float
     */
    public function getCurrentAskPrice()
    {
        return $this->currentAskPrice;
    }

    /**
     * @param float $currentAskPrice
     */
    public function setCurrentAskPrice($currentAskPrice)
    {
        $this->currentAskPrice = $currentAskPrice;
    }

    /**
     * @return int
     */
    public function getCurrentAskSize()
    {
        return $this->currentAskSize;
    }

    /**
     * @param int $currentAskSize
     */
    public function setCurrentAskSize($currentAskSize)
    {
        $this->currentAskSize = $currentAskSize;
    }

    /**
     * @return float
     */
    public function getCurrentBidPrice()
    {
        return $this->currentBidPrice;
    }

    /**
     * @param float $currentBidPrice
     */
    public function setCurrentBidPrice($currentBidPrice)
    {
        $this->currentBidPrice = $currentBidPrice;
    }

    /**
     * @return int
     */
    public function getCurrentBidSize()
    {
        return $this->currentBidSize;
    }

    /**
     * @param int $currentBidSize
     */
    public function setCurrentBidSize($currentBidSize)
    {
        $this->currentBidSize = $currentBidSize;
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
     * @return int
     */
    public function getNumberOfShares()
    {
        return $this->numberOfShares;
    }

    /**
     * @param int $numberOfShares
     */
    public function setNumberOfShares($numberOfShares)
    {
        $this->numberOfShares = $numberOfShares;
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
}
