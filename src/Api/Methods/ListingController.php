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
        $data = $this->request('search/listings/' . $secIdentPart);
        /** @var Listing[] $oResult */
        $oResult = $this->serializer->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\Listing>',
            'json'
        );
        if (!empty($oResult) && $oResult[0]->getSecurityIdentifier() == null) {
            $oResult = $this->serializer->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param $securityIdentifier
     *
     * @return ListingProfile|Error
     */
    public function getProfile($securityIdentifier)
    {
        $data = $this->request('listingprofiles/' . $securityIdentifier);
        /** @var ListingProfile $oResult */
        $oResult = $this->serializer->deserialize(
            $data,
            'Alphatrader\ApiBundle\Model\ListingProfile',
            'json'
        );
        if ($oResult->getSecurityIdentifier() == null) {
            $oResult = $this->serializer->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }
}
