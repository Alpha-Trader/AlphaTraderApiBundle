<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\SearchController;

/**
 * Class SearchTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  ljbergmann <l.bergmann@sky-lab.de>
 */

trait SearchTrait
{

    /**
     * @param $search
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\SearchResult[]
     */
    public function search($search)
    {
        return $this->getSearchController()->search($search);
    }
    
    /**
     * @return SearchController
     */
    public function getSearchController()
    {
        return new SearchController($this->config, $this->jwt);
    }
}
