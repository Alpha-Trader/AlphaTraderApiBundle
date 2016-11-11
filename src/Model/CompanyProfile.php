<?php

namespace Alphatrader\ApiBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation;

/**
 * Class CompanyProfile
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class CompanyProfile
{
    use CompanyTrait;
    
    /**
     * @var PriceSpread
     * @Annotation\Type("Alphatrader\ApiBundle\Model\PriceSpread")
     * @Annotation\SerializedName("currentSpread")
     */
    private $currentSpread;

    /**
     * @var SecuritySponsorship[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\SecuritySponsorship>")
     * @Annotation\SerializedName("designatedSponsors")
     */
    private $designatedSponsors;

    /**
     * @var SecurityOrderLogEntry
     * @Annotation\Type("Alphatrader\ApiBundle\Model\SecurityOrderLogEntry")
     * @Annotation\SerializedName("lastOrderLogEntry")
     */
    private $lastOrderLogEntry;

    /**
     * @var SecurityPrice
     * @Annotation\Type("Alphatrader\ApiBundle\Model\SecurityPrice")
     * @Annotation\SerializedName("lastPrice")
     */
    private $lastPrice;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("marketCap")
     */
    private $marketCap;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("outstandingShares")
     */
    private $outstandingShares;

    /**
     * @var SecurityPrice[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\SecurityPrice>")
     * @Annotation\SerializedName("prices14d")
     */
    private $prices14d;

    /**
     * @return PriceSpread
     */
    public function getCurrentSpread()
    {
        return $this->currentSpread;
    }

    /**
     * @param PriceSpread $currentSpread
     */
    public function setCurrentSpread(PriceSpread $currentSpread)
    {
        $this->currentSpread = $currentSpread;
    }

    /**
     * @return ArrayCollection<SecuritySponsorship>
     */
    public function getDesignatedSponsors()
    {
        return $this->designatedSponsors;
    }

    /**
     * @param SecuritySponsorship[] $designatedSponsors
     */
    public function setDesignatedSponsors($designatedSponsors)
    {
        $this->designatedSponsors = $designatedSponsors;
    }

    /**
     * @return SecurityOrderLogEntry
     */
    public function getLastOrderLogEntry()
    {
        return $this->lastOrderLogEntry;
    }

    /**
     * @param SecurityOrderLogEntry $lastOrderLogEntry
     */
    public function setLastOrderLogEntry($lastOrderLogEntry)
    {
        $this->lastOrderLogEntry = $lastOrderLogEntry;
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
    public function setLastPrice(SecurityPrice $lastPrice)
    {
        $this->lastPrice = $lastPrice;
    }

    /**
     * @return float
     */
    public function getMarketCap()
    {
        return $this->marketCap;
    }

    /**
     * @param float $marketCap
     */
    public function setMarketCap($marketCap)
    {
        $this->marketCap = $marketCap;
    }

    /**
     * @return int
     */
    public function getOutstandingShares()
    {
        return $this->outstandingShares;
    }

    /**
     * @param int $outstandingShares
     */
    public function setOutstandingShares($outstandingShares)
    {
        $this->outstandingShares = $outstandingShares;
    }

    /**
     * @return ArrayCollection<SecurityPrice>
     */
    public function getPrices14d()
    {
        return $this->prices14d;
    }

    /**
     * @param SecurityPrice[] $prices14d
     */
    public function setPrices14d($prices14d)
    {
        $this->prices14d = $prices14d;
    }
}
