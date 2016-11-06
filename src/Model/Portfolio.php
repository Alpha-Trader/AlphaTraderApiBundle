<?php

namespace Alphatrader\ApiBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation;

/**
 * Class Portfolio
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Portfolio
{
    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("cash")
     */
    private $cash;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("committedCash")
     */
    private $committedCash;

    /**
     * @var PortfolioPosition[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\PortfolioPosition>")
     * @Annotation\SerializedName("positions")
     */
    private $positions;

    /**
     * @return float
     */
    public function getCash()
    {
        return $this->cash;
    }

    /**
     * @param float $cash
     */
    public function setCash($cash)
    {
        $this->cash = $cash;
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
     * @return PortfolioPosition[]
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param PortfolioPosition[] $positions
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;
    }
}
