<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class SalaryPayment
 *
 * @package Alphatrader\ApiBundle\Model
 * @author  ljbergmann <l.bergmann@sky-lab.de>
 */
class SearchResult
{
    /**
     * @var Bond
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Bond")
     * @Annotation\SerializedName("bond")
     */
    private $bond;

    /**
     * @var CompanyName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\CompanyName")
     * @Annotation\SerializedName("company")
     */
    private $company;

    /**
     * @var Listing
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Lsting")
     * @Annotation\SerializedName("listing")
     */
    private $listing;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("naturalIdentifier")
     */
    private $naturalIdentifier;

    /**
     * @var SystemBond
     * @Annotation\Type("Alphatrader\ApiBundle\Model\SystemBond")
     * @Annotation\SerializedName("systemBond")
     */
    private $systemBond;

    /**
     * @var UserName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     * @Annotation\SerializedName("userAccount")
     */
    private $userAccount;

    /**
     * @return Bond
     */
    public function getBond()
    {
        return $this->bond;
    }

    /**
     * @param Bond $bond
     */
    public function setBond($bond)
    {
        $this->bond = $bond;
    }

    /**
     * @return CompanyName
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param CompanyName $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
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
     * @return string
     */
    public function getNaturalIdentifier()
    {
        return $this->naturalIdentifier;
    }

    /**
     * @param string $naturalIdentifier
     */
    public function setNaturalIdentifier($naturalIdentifier)
    {
        $this->naturalIdentifier = $naturalIdentifier;
    }

    /**
     * @return SystemBond
     */
    public function getSystemBond()
    {
        return $this->systemBond;
    }

    /**
     * @param SystemBond $systemBond
     */
    public function setSystemBond($systemBond)
    {
        $this->systemBond = $systemBond;
    }

    /**
     * @return UserName
     */
    public function getUserAccount()
    {
        return $this->userAccount;
    }

    /**
     * @param UserName $userAccount
     */
    public function setUserAccount($userAccount)
    {
        $this->userAccount = $userAccount;
    }
}
