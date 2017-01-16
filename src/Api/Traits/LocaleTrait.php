<?php

namespace Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\LocaleController;

/**
 * Trait LocaleTrait
 * @package Api\Traits
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
trait LocaleTrait
{
    /**
     * @return array|\JMS\Serializer\scalar|mixed|object
     */
    public function getLocales()
    {
        return $this->getLocaleController()->getLocales();
    }

    /**
     * @return LocaleController
     */
    public function getLocaleController()
    {
        return new LocaleController($this->config, $this->jwt);
    }
}