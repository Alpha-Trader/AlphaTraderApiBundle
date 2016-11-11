<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Bankaccounts
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class UserCapabilities
{
    /**
     * @var boolean
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("level2User")
     */
    private $level2User;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("level2UserEndDate")
     */
    private $level2UserEndDate;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("locale")
     */
    private $locale;

    /**
     * @var boolean
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("partner")
     */
    private $partner;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("partnerId")
     */
    private $partnerId;

    /**
     * @var boolean
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("premium")
     */
    private $premium;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("premiumEndDate")
     */
    private $premiumEndDate;

    /**
     * @return boolean
     */
    public function isLevel2User()
    {
        return $this->level2User;
    }

    /**
     * @param boolean $level2User
     */
    public function setLevel2User($level2User)
    {
        $this->level2User = $level2User;
    }

    /**
     * @return int
     */
    public function getLevel2UserEndDate()
    {
        return $this->level2UserEndDate;
    }

    /**
     * @param int $level2UserEndDate
     */
    public function setLevel2UserEndDate($level2UserEndDate)
    {
        $this->level2UserEndDate = $level2UserEndDate;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return boolean
     */
    public function isPartner()
    {
        return $this->partner;
    }

    /**
     * @param boolean $partner
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;
    }

    /**
     * @return string
     */
    public function getPartnerId()
    {
        return $this->partnerId;
    }

    /**
     * @param string $partnerId
     */
    public function setPartnerId($partnerId)
    {
        $this->partnerId = $partnerId;
    }

    /**
     * @return boolean
     */
    public function hasPremium()
    {
        return $this->premium;
    }

    /**
     * @param boolean $premium
     */
    public function setPremium($premium)
    {
        $this->premium = $premium;
    }

    /**
     * @return int
     */
    public function getPremiumEndDate()
    {
        return $this->premiumEndDate;
    }

    /**
     * @param int $premiumEndDate
     */
    public function setPremiumEndDate($premiumEndDate)
    {
        $this->premiumEndDate = $premiumEndDate;
    }
}
