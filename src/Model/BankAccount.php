<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;
use JMS\Serializer\Annotation\ExclusionPolicy;

/**
 * Class BankAccount
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class BankAccount
{
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("cash")
     */
    private $cash;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return float
     */
    public function getCash()
    {
        return $this->cash;
    }

    /**
     * @param float $cash
     */
    public function setCash($cash)
    {
        $this->cash = $cash;
    }
}
