<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Ceo
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Ceo
{
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserCapabilities")
     * @Annotation\SerializedName("userCapabilities")
     */
    private $userCapabilities;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("username")
     */
    private $username;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("gravatarHash")
     */
    private $gravatarHash;

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

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
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
}
