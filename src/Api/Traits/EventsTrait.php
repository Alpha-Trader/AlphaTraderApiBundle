<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\EventController;

/**
 * Class EventsTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait EventsTrait
{
    /**
     * @param \DateTime $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]
     */
    public function getEvents(\DateTime $afterDate = null)
    {
        return $this->getEventController()->getEvents($this->formatTimeStamp($afterDate));
    }

    /**
     * @param           $realms
     * @param \DateTime $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]
     */
    public function getEventsByRealms($realms, \DateTime $afterDate = null)
    {
        return $this->getEventController()->searchEvents($realms, $this->formatTimeStamp($afterDate));
    }

    /**
     * @param           $eventtype
     * @param string    $realms
     * @param \DateTime $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]
     */
    public function getEventsByType($eventtype, $realms = '', \DateTime $afterDate = null)
    {
        return $this->getEventController()->searchEventsByType($eventtype, $realms, $this->formatTimeStamp($afterDate));
    }

    /**
     * @return EventController
     */
    public function getEventController()
    {
        return new EventController($this->config, $this->jwt);
    }
}