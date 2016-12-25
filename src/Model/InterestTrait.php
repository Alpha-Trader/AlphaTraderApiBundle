<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Trait Interest
 * @package Alphatrader\ApiBundle\Model
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
trait InterestTrait
{
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("interest")
     */
    private $interest;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("userId")
     */
    private $userId;

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
     * @return int
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * @param int $interest
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }


}