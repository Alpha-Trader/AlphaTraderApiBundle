<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\SecurityPriceController;

/**
 * Class SecurityPriceTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  ljbergmann <l.bergmann@sky-lab.de>
 */
trait SecurityPriceTrait
{
    /**
     * @param $secIdent
     * @param \DateTime|null $startDate
     * @param \DateTime|null $endDate
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\SecurityPrice[]
     */
    public function getSecurityPrices(
        $secIdent,
        \DateTime $startDate = null,
        \DateTime $endDate = null
    ) {
        return $this->getSecurityPriceController()->getSecurityPrices(
            $secIdent,
            $this->formatTimeStamp($startDate),
            $this->formatTimeStamp($endDate)
        );
    }

    /**
     * @return SecurityPriceController
     */
    public function getSecurityPriceController()
    {
        return new SecurityPriceController($this->config, $this->jwt);
    }
}
