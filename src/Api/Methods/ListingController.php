<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;

/**
 * Class ListingController
 *
 * @package AlphaTrader\API\Controller
 * @author  Tr0nYx <tronyx@bric.finance>
 */
class ListingController extends ApiClient
{

    /**
     * @param $securityIdentifier
     *
     * @return \Alphatrader\ApiBundle\Model\ListingProfile|\Alphatrader\ApiBundle\Model\Error
     */
    public function getProfile($securityIdentifier)
    {
        $data = $this->get('listingprofiles/' . $securityIdentifier);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\ListingProfile');
    }

    /**
     * @param $securityIdentifier
     * @param $name
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\ListingProfile
     */
    public function getProfileV2($securityIdentifier, $name)
    {
        $data = $this->get('v2/listingprofiles/', [
            'securityIdentifier' => $securityIdentifier,
            'name'               => $name
        ]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\ListingProfile');
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Listing[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getAllListings()
    {
        $data = $this->get('listings/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Listing>');
    }

    /**
     * @param $securityIdentifier
     * @return array|\JMS\Serializer\scalar|mixed|object
     */
    public function getOutstandingShares($securityIdentifier)
    {
        $data = $this->get('listings/outstandingshares/'.$securityIdentifier);
        $oResult = $this->getSerializer()->deserialize($data->getBody()->getContents(), 'integer', 'json');

        return $oResult;
    }

    /**
     * @param $securityIdentifier
     *
     * @return \Alphatrader\ApiBundle\Model\Listing|\Alphatrader\ApiBundle\Model\Error
     */
    public function getListingBySecurityIdentifier($securityIdentifier)
    {
        $data = $this->get('listings/' . $securityIdentifier);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Listing');
    }


    /**
     * @param $secIdentPart
     *
     * @return \Alphatrader\ApiBundle\Model\Listing[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getListingBySecurityIdentifierPart($secIdentPart)
    {
        $data = $this->get('listings/' . $secIdentPart);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Listing>');
    }

    /**
     * @param $securityIdentifier
     *
     * @return \Alphatrader\ApiBundle\Model\Shareholder[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getShareholder($securityIdentifier)
    {
        $data = $this->get('shareholders/' . $securityIdentifier);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Shareholder>');
    }

    /**
     * @param $page
     * @param $size
     * @param $sort
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\ListingPage
     */
    public function getListings($page, $size, $sort)
    {
        $data = $this->get('v2/listings', [
            "page" => $page,
            "size" => $size,
            "sort" => $sort
        ]);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\ListingPage');
    }
}
