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
 * Class StatisticsController
 *
 * @package AlphaTrader\API\Controller
 * @author  ljbergmann <l.bergmann@sky-lab.de>
 */
class StatisticsController extends ApiClient
{

    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\MarketStatistics[]
     */
    public function getMarketStatisticsAsObject()
    {
        $data = $this->get('marketstatistics/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\MarketStatistics>');
    }

    /**
     * @return array|\JMS\Serializer\scalar|mixed|object
     */
    public function getMarketStatisticsAsArray()
    {
        $data = $this->get('marketstatistics/');
        return $this->getSerializer()->deserialize($data->getBody()->getContents(), 'array', 'json');
    }

    /**
     * @param $type
     * @return array
     */
    public function getMarketStatisticsByType($type)
    {
        $result = array();
        $data = $this->getMarketStatisticsAsArray();

        foreach ($data as $value) {
            $result[$value['date']] = $value[$type];
        }

        return $result;
    }
}
