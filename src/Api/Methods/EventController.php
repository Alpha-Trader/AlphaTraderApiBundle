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
 * Class EventController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class EventController extends ApiClient
{
    /**
     * @param int $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getEvents($afterDate)
    {
        $data = $this->get('events/', ['afterDate' => $afterDate]);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Events>');
    }

    /**
     * @param int $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Error[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getEventsForUser($afterDate)
    {
        $data = $this->get('events/userr', ['afterDate' => $afterDate]);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Events>');
    }
    
    /**
     * @param      $realms
     * @param int $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function searchEvents($realms, $afterDate)
    {
        $data = $this->get('events/', ['realms' => $realms, 'afterDate' => $afterDate]);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Events>');
    }

    /**
     * @param $eventtype
     * @param $realms
     * @param $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function searchEventsByType($eventtype, $realms, $afterDate)
    {
        $data = $this->get('/api/search/events/type/' . $eventtype, ['realms' => $realms, 'afterDate' => $afterDate]);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Events>');
    }

    /**
     * @param $fullTextPart
     * @param $afterDate
     * @return \Alphatrader\ApiBundle\Model\Error[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function searchEventsByFullTextPart($fullTextPart, $afterDate)
    {
        $data = $this->get('/api/search/events/'.$fullTextPart, ['afterDate' => $afterDate]);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Events>');
    }
}
