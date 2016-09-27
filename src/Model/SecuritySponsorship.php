<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class SecuritySponsorship
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class SecuritySponsorship
{
    /**
     * @var int
     * @Annotation\Type("Alphatrader\ApiBundle\Model\CompactCompany")
     * @Annotation\SerializedName("designatedSponsor")
     */
    private $designatedSponsor;

    /**
     * @var float
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Listing")
     * @Annotation\SerializedName("listing")
     */
    private $listing;

    /**
     * @var float
     * @Annotation\Type("Alphatrader\ApiBundle\Model\DesignatedSponsorRating")
     * @Annotation\SerializedName("sponsorRating")
     */
    private $sponsorRating;

    /**
     * @return int
     */
    public function getDesignatedSponsor()
    {
        return $this->designatedSponsor;
    }

    /**
     * @param int $designatedSponsor
     */
    public function setDesignatedSponsor($designatedSponsor)
    {
        $this->designatedSponsor = $designatedSponsor;
    }

    /**
     * @return float
     */
    public function getListing()
    {
        return $this->listing;
    }

    /**
     * @param float $listing
     */
    public function setListing($listing)
    {
        $this->listing = $listing;
    }

    /**
     * @return float
     */
    public function getSponsorRating()
    {
        return $this->sponsorRating;
    }

    /**
     * @param float $sponsorRating
     */
    public function setSponsorRating($sponsorRating)
    {
        $this->sponsorRating = $sponsorRating;
    }
}
