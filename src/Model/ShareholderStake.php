<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class ShareholderStake
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class ShareholderStake
{
    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("averagePrice")
     */
    private $averagePrice;

    /**
     * @var int
     * @Annotation\Type("int")
     * @Annotation\SerializedName("numberOfShares")
     */
    private $numberOfShares;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("stakeInPercent")
     */
    private $stakeInPercent;

    /**
     * @return float
     */
    public function getAveragePrice()
    {
        return $this->averagePrice;
    }

    /**
     * @param float $averagePrice
     */
    public function setAveragePrice($averagePrice)
    {
        $this->averagePrice = $averagePrice;
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
     * @return float
     */
    public function getStakeInPercent()
    {
        return $this->stakeInPercent;
    }

    /**
     * @param float $stakeInPercent
     */
    public function setStakeInPercent($stakeInPercent)
    {
        $this->stakeInPercent = $stakeInPercent;
    }
}
