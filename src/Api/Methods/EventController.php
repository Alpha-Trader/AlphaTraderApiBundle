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
use Alphatrader\ApiBundle\Model\Events;
use JMS\Serializer\SerializerBuilder;

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
     * @return Events[]|Error
     */
    public function getEvents($afterDate)
    {
        $data = $this->get('events/', ['afterDate' => $afterDate]);
        /** @var Events[] $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\Events>',
            'json'
        );
        if (empty($oResult) && !isset($oResult[0])) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param      $realms
     * @param int $afterDate
     *
     * @return Events[]|Error
     */
    public function searchEvents($realms, $afterDate)
    {
        $data = $this->get('events/', ['realms' => $realms, 'afterDate' => $afterDate]);
        /** @var Events[] $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\Events>',
            'json'
        );
        if (empty($oResult) && !isset($oResult[0])) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param $eventtype
     * @param $realms
     * @param $afterDate
     *
     * @return Events[]|Error
     */
    public function searchEventsByType($eventtype, $realms, $afterDate)
    {
        $data = $this->get('/api/search/events/type/' . $eventtype, ['realms' => $realms, 'afterDate' => $afterDate]);
        /** @var Events[] $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\Events>',
            'json'
        );
        if (empty($oResult) && !isset($oResult[0])) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }
}
