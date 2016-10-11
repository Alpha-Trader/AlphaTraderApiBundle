<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\ListingController;

/**
 * Class ListingTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait ListingTrait
{

    /**
     * @param $securityIdent
     *
     * @return \Alphatrader\ApiBundle\Model\ListingProfile
     */
    public function getListingProfile($securityIdent)
    {
        return $this->getListingController()->getProfile($securityIdent);
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Listing[]
     */
    public function getAllListings()
    {
        return $this->getListingController()->getAllListings();
    }

    /**
     * @param $secIdentPart
     *
     * @return \Alphatrader\ApiBundle\Model\Listing[]
     */
    public function getListing($secIdent)
    {
        return $this->getListingController()->getListingBySecurityIdentifier($secIdent);
    }

    /**
     * @param $securityIdentifier
     * @return array|\JMS\Serializer\scalar|mixed|object
     */
    public function getOutstandingShares($securityIdentifier)
    {
        return $this->getListingController()->getOutstandingShares($securityIdentifier);
    }

    /**
     * @param $securityIdentifier
     * @return \Alphatrader\ApiBundle\Model\Shareholder[]
     */
    public function getShareholder($securityIdentifier)
    {
        return $this->getListingController()->getShareholder($securityIdentifier);
    }

    /**
     * @param $secIdentPart
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Listing[]
     */
    public function getListingByPart($secIdentPart)
    {
        return $this->getListingController()->getListingBySecurityIdentifierPart($secIdentPart);
    }

    /**
     * @return ListingController
     */
    public function getListingController()
    {
        return new ListingController($this->config, $this->jwt);
    }
}
