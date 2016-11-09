<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Company
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Company
{
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    protected $id;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\BankAccount")
     * @Annotation\SerializedName("bankAccount")
     */
    protected $bankAccount;

    /**
     * @var UserName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     * @Annotation\SerializedName("ceo")
     */
    protected $ceo;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Listing")
     * @Annotation\SerializedName("listing")
     */
    protected $listing;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("name")
     */
    protected $name;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("securitiesAccountId")
     */
    protected $securitiesAccountId;

    /**
     * @return Bankaccount
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param Bankaccount $bankAccount
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;
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
     * @return Listing
     */
    public function getListing()
    {
        return $this->listing;
    }

    /**
     * @param Listing $listing
     */
    public function setListing($listing)
    {
        $this->listing = $listing;
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
    public function getSecuritiesAccountId()
    {
        return $this->securitiesAccountId;
    }

    /**
     * @param mixed $securitiesAccountId
     */
    public function setSecuritiesAccountId($securitiesAccountId)
    {
        $this->securitiesAccountId = $securitiesAccountId;
    }
}
