<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;

/**
 * Class PriceSpreadController
 *
 * @package AlphaTrader\API\Controller
 * @author  Tr0nYx <tronyx@bric.finance>
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class PriceSpreadController extends ApiClient
{
    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PriceSpreadListing[]
     */
    public function getPriceSpreads()
    {
        $data = $this->get('pricespreads/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\PriceSpreadListing>');
    }

    /**
     * @param $secIdent
     *
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PriceSpreadListing
     */
    public function getPriceSpread($secIdent)
    {
        $data = $this->get('pricespreads/'.$secIdent);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\PriceSpreadListing');
    }

    /**
     * @param integer $page
     * @param integer $size
     * @param string $sort
     *
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PriceSpreadPage
     */
    public function getPriceSpreadV2($page, $size, $sort)
    {

        $data = $this->get('v2/pricespreads', array(
            'page' => $page,
            'size' => $size,
            'sort' => $sort
        ));

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\PriceSpreadPage');
    }

    /**
     * @return string
     */
    public function getPriceSpreadFilterDefinitions()
    {
        $request = $this->get($this->config['apiurl'] . '/v2/filterdefinition/pricespreads');
        return $request->getBody()->getContents();
    }

    /**
     * @return string
     */
    public function getUserPriceSpreadFilter()
    {
        $request = $this->get($this->config['apiurl'] . '/v2/filter/pricespreads');
        return $request->getBody()->getContents();
    }

    /**
     * @param $filter
     * @param $filterId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PriceSpreadListing[]
     */
    public function filterPriceSpreads($filter, $filterId)
    {
        $data = $this->post($this->config['apiurl'] . '/v2/filter/pricespreads', ['filterId' => $filterId], $filter);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\PriceSpreadListing>');
    }

    /**
     * @param $filterId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\MessagePrototype
     */
    public function deleteFilter($filterId)
    {
        $data = $this->delete('v2/filter/pricespreads/'.$filterId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\MessagePrototype');
    }
}
