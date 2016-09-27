<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class SecurityPrice
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class SecurityPrice
{
    use DateTrait;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("value")
     */
    private $value;
    
    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
