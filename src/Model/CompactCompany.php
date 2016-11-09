<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class CompactCompany
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class CompactCompany
{
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    protected $id;

    /**
     * @var UserName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     * @Annotation\SerializedName("ceo")
     */
    protected $ceo;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("name")
     */
    protected $name;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("securityIdentifier")
     */
    protected $securityIdentifier;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("securitiesAccountId")
     */
    protected $secAccId;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSecurityIdentifier()
    {
        return $this->securityIdentifier;
    }

    /**
     * @param mixed $securityIdentifier
     */
    public function setSecurityIdentifier($securityIdentifier)
    {
        $this->securityIdentifier = $securityIdentifier;
    }

    /**
     * @return UserName
     */
    public function getCeo()
    {
        return $this->ceo;
    }

    /**
     * @param UserName $ceo
     */
    public function setCeo($ceo)
    {
        $this->ceo = $ceo;
    }

    /**
     * @return mixed
     */
    public function getSecuritiesAccountId()
    {
        return $this->secAccId;
    }

    /**
     * @param mixed $secAccId
     */
    public function setSecuritiesAccountId($secAccId)
    {
        $this->secAccId = $secAccId;
    }
}
