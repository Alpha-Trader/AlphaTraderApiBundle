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
     * @param $secIdentPart
     *
     * @return \Alphatrader\ApiBundle\Model\Listing[]
     */
    public function getListing($secIdentPart)
    {
        return $this->getListingController()->getListing($secIdentPart);
    }

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
     * @return ListingController
     */
    public function getListingController()
    {
        return new ListingController($this->config, $this->jwt);
    }
}
