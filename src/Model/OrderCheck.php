<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class OrderCheck
 *
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class OrderCheck
{
    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfShares")
     */
    private $numberOfShares;

    /**
     * @var PriceSpread
     * @Annotation\Type("Alphatrader\ApiBundle\Model\PriceSpread")
     * @Annotation\SerializedName("spread")
     */
    private $spread;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("uncommittedCash")
     */
    private $uncommittedCash;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("volume")
     */
    private $volume;

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
     * @return mixed
     */
    public function getSpread()
    {
        return $this->spread;
    }

    /**
     * @param mixed $spread
     */
    public function setSpread($spread)
    {
        $this->spread = $spread;
    }

    /**
     * @return float
     */
    public function getUncommittedCash()
    {
        return $this->uncommittedCash;
    }

    /**
     * @param float $uncommittedCash
     */
    public function setUncommittedCash($uncommittedCash)
    {
        $this->uncommittedCash = $uncommittedCash;
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
