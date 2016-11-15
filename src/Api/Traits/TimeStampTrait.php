<?php

namespace Alphatrader\ApiBundle\Api\Traits;

/**
 * Class TimeStampTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  Tr0nYx
 */
trait TimeStampTrait
{
    /**
     * @param $time
     *
     * @return int|string
     */
    protected function formatTimeStamp($time)
    {
        return ($time instanceof \DateTime ? ($time->getTimestamp() * 1000) : ((int)$time * 1000)) ?: null;
    }
}
