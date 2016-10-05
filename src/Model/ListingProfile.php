<?php

namespace Alphatrader\ApiBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation;

/**
 * Class ListingProfile
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 * @SuppressWarnings(PHPMD)
 */
class ListingProfile
{
    use DateTrait;

    /**
     * @var Bond
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Bond")
     * @Annotation\SerializedName("bond")
     */
    private $bond;

    /**
     * @var CompanyCompactProfile
     * @Annotation\Type("Alphatrader\ApiBundle\Model\CompanyCompactProfile")
     * @Annotation\SerializedName("company")
     */
    private $company;

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
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

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
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("name")
     */
    private $name;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("outstandingShares")
     */
    private $outstandingShares;

    /**
     * @var ArrayCollection<SecurityPrice>
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\SecurityPrice>")
     * @Annotation\SerializedName("prices14d")
     */
    private $prices14d;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("securityIdentifier")
     */
    private $securityIdentifier;

    /**
     * @var Bond
     * @Annotation\Type("Alphatrader\ApiBundle\Model\SystemBond")
     * @Annotation\SerializedName("systemBond")
     */
    private $systemBond;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("type")
     */
    private $type;

    /**
     * @return Bond
     */
    public function getBond()
    {
        return $this->bond;
    }

    /**
     * @param Bond $bond
     */
    public function setBond($bond)
    {
        $this->bond = $bond;
    }

    /**
     * @return CompanyCompactProfile
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param CompanyCompactProfile $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

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
    public function setCurrentSpread($currentSpread)
    {
        $this->currentSpread = $currentSpread;
    }

    /**
     * @return SecuritySponsorship[]
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
    public function setLastPrice($lastPrice)
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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @param ArrayCollection<SecurityPrice> $prices14d
     */
    public function setPrices14d($prices14d)
    {
        $this->prices14d = $prices14d;
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

    /**
     * @return Bond
     */
    public function getSystemBond()
    {
        return $this->systemBond;
    }

    /**
     * @param Bond $systemBond
     */
    public function setSystemBond($systemBond)
    {
        $this->systemBond = $systemBond;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        if (null !== $this->bond) {
            return $this->bond->getName();
        }
        if (null !== $this->company) {
            return $this->company->getName();
        }
        if (null !== $this->systemBond) {
            return $this->systemBond->getName();
        }

        return null;
    }

    /**
     * @return string
     */
    public function getIssuerName()
    {
        if (null !== $this->company) {
            return $this->getCompany()->getName();
        }
        if (null !== $this->bond) {
            return $this->getBond()->getIssuer()->getName();
        }

        return "Central Bank";
    }

    /**
     * @return mixed
     */
    public function getIssuerSecurityIdentifier()
    {
        if (null !== $this->company || null !== $this->systemBond) {
            return $this->securityIdentifier;
        }
        if (null !== $this->bond) {
            return $this->getBond()->getIssuer()->getListing()->getSecurityIdentifier();
        }

        return null;
    }

    /**
     * @return Bond
     */
    public function getBondOrSystemBond()
    {
        if (null !== $this->bond) {
            return $this->bond;
        }

        return $this->systemBond;
    }

    /**
     * @return float|int|string
     */
    public function getPriceGain()
    {
        /** @var SecurityPrice[] $prices14d */
        $prices14d = $this->prices14d;
        $size = count($prices14d);
        if ($size < 2) {
            return 0;
        }
        $currentPrice = $prices14d[$size - 1]->getValue();
        $lastPrice = $prices14d[$size - 2]->getValue();
        $res = (($currentPrice / $lastPrice) - 1) * 100;

        if (empty($res)) {
            return "0.00";
        }

        return $res;
    }

    /**
     * @return SecurityPrice|null
     */
    public function getPreviousPriceDate()
    {
        /** @var SecurityPrice[] $prices14d */
        $prices14d = $this->prices14d;
        $size = count($prices14d);
        if ($size < 2) {
            return null;
        }
        $lastPriceDate = $prices14d[$size - 2]->getDate();

        return $lastPriceDate;
    }

    /**
     * @return string
     */
    public function getPrices14dDates()
    {
        if (empty($this->prices14d)) {
            return "";
        }

        return implode(
            ',',
            array_map(
                function ($securityprice) {
                    $date = $securityprice instanceof SecurityPrice
                        ? $securityprice->getDate()->getTimestamp() : $securityprice['date'] / 1000;
                    $seconds = $date;

                    return '"' . date("d.m.", $seconds) . '"';
                },
                $this->prices14d->toArray()
            )
        );
    }

    /**
     * @return string
     */
    public function getPrices14dValues()
    {
        if (empty($this->prices14d)) {
            return "";
        }

        return implode(
            ',',
            array_map(
                function ($securityprice) {
                    return $securityprice instanceof SecurityPrice
                        ? $securityprice->getValue() : $securityprice['value'];
                },
                $this->prices14d->toArray()
            )
        );
    }
}
