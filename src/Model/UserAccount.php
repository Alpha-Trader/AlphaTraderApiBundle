<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Bankaccounts
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Useraccount
{

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @Annotation\Type("string")
     * @Annotation\Accessor(getter="getEmailAddress",setter="setEmailAddress")
     * @Annotation\SerializedName("emailAddress")
     */
    private $emailAddress;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserCapabilities")
     * @Annotation\Accessor(getter="getUserCapabilities",setter="setUserCapabilities")
     * @Annotation\SerializedName("userCapabilities")
     */
    private $userCapabilities;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("username")
     */
    private $username;

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param mixed $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserCapabilities()
    {
        return $this->userCapabilities;
    }

    /**
     * @param mixed $userCapabilities
     */
    public function setUserCapabilities($userCapabilities)
    {
        $this->userCapabilities = $userCapabilities;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
}
