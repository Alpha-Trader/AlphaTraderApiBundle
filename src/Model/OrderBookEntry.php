<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class OrderBookEntry
 *
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class OrderBookEntry
{
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("action")
     */
    private $action;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("priceLimit")
     */
    private $priceLimit;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("size")
     */
    private $size;

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getPriceLimit()
    {
        return $this->priceLimit;
    }

    /**
     * @param mixed $priceLimit
     */
    public function setPriceLimit($priceLimit)
    {
        $this->priceLimit = $priceLimit;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }
}
