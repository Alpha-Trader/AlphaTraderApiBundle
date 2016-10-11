<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class UserName
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class UserName
{
    /**
     * @var string
     * @Annotation\Type("string")
     */
    private $id;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("username")
     */
    private $username;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("gravatarHash")
     */
    private $gravatarHash;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserCapabilities")
     * @Annotation\SerializedName("userCapabilities")
     */
    private $userCapabilities;
    
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

    /**
     * @return string
     */
    public function getGravatarHash()
    {
        return $this->gravatarHash;
    }

    /**
     * @param string $gravatarHash
     */
    public function setGravatarHash($gravatarHash)
    {
        $this->gravatarHash = $gravatarHash;
    }

    /**
     * @return UserCapabilities
     */
    public function getUserCapabilities()
    {
        return $this->userCapabilities;
    }

    /**
     * @param UserCapabilities $userCapabilities
     */
    public function setUserCapabilities($userCapabilities)
    {
        $this->userCapabilities = $userCapabilities;
    }
}
