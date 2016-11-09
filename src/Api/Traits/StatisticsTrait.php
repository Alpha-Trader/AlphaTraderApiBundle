<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\StatisticsController;

/**
 * Class StatisticsTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  ljbergmann <l.bergmann@sky-lab.de>
 */
trait StatisticsTrait
{

    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\MarketStatistics[]
     */
    public function getMarketStatistics()
    {
        return $this->getStatisticsController()->getMarketStatisticsAsObject();
    }

    /**
     * @return array|\JMS\Serializer\scalar|mixed|object
     */
    public function getMarketStatisticsAsArray()
    {
        return $this->getStatisticsController()->getMarketStatisticsAsArray();
    }

    /**
     * @param $type
     * @return mixed
     */
    public function getMarketStatisticsByType($type)
    {
      return $this->getStatisticsController()->getMarketStatisticsByType($type);
    }

    /**
     * @return StatisticsController
     */
    public function getStatisticsController()
    {
        return new StatisticsController($this->config, $this->jwt);
    }
}