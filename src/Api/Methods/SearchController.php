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
 * Class SearchController
 *
 * @package AlphaTrader\API\Controller
 * @author  ljbergmann <l.bergmann@sky-lab.de>
 */
class SearchController extends ApiClient
{
    /**
     * @param $search
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\SearchResult[]
     */
    public function search($search)
    {
        $data = $this->get('multisearch/'.$search);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\SearchResult>');
    }
}
