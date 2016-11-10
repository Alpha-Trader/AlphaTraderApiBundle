<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\PartnerController;

/**
 * Class PartnerTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  ljbergmann <l.bergmann@sky-lab.de>
 */
trait PartnerTrait
{

    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\UserName[]
     */
    public function getPartners()
    {
        return $this->getPartnerController()->getPartners();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\UserName
     */
    public function registerPartner()
    {
        return $this->getPartnerController()->registerPartner();
    }

    /**
     * @return PartnerController
     */
    public function getPartnerController()
    {
        return new PartnerController($this->config, $this->jwt);
    }
}