<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class UserName
 *
 * @package                            Alphatrader\ApiBundle\Model
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
     * @var \DateTime
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("registrationDate")
     */
    private $registrationDate;

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

    /**
     * @return \DateTime
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * @param \DateTime $registrationDate
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;
    }


    /**
     * @SuppressWarnings("unused")
     * @Annotation\PostDeserialize
     */
    private function afterDeserialization()
    {
        if ($this->registrationDate !== null) {
            $date = substr($this->registrationDate, 0, 10) . '.' . substr($this->registrationDate, 10);
            $micro = sprintf("%06d", ($date - floor($date)) * 1000000);
            $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $date));
            $this->registrationDate = $date;
        }
    }

    /**
     * @SuppressWarnings("unused")
     * @Annotation\PreSerialize
     */
    private function preSerialization()
    {
        if ($this->registrationDate instanceof \DateTime) {
            $this->registrationDate = $this->registrationDate->getTimestamp();
        }
    }
}
