<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\Error;
use Alphatrader\ApiBundle\Model\Listing;
use Alphatrader\ApiBundle\Model\ListingProfile;

/**
 * Class ListingController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class ListingController extends ApiClient
{
    /**
     * @param $secIdentPart
     *
     * @return Listing[]|Error
     */
    public function getListing($secIdentPart)
    {
        $data = $this->get('search/listings/' . $secIdentPart);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Listing>');
    }

    /**
     * @param $securityIdentifier
     *
     * @return ListingProfile|Error
     */
    public function getProfile($securityIdentifier)
    {
        $data = $this->get('listingprofiles/' . $securityIdentifier);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\ListingProfile');
    }
}
