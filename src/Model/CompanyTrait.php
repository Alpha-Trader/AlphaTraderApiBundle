<?php

namespace Alphatrader\ApiBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation;

/**
 * Trait CompanyTrait
 * @package Alphatrader\ApiBundle\Model
 * @author Tr0nYx
 */
trait CompanyTrait
{
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @var BankAccount
     * @Annotation\Type("Alphatrader\ApiBundle\Model\BankAccount")
     * @Annotation\SerializedName("bankAccount")
     */
    private $bankAccount;
    
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("securitiesAccountId")
     */
    private $securitiesAccountId;

    /**
     * @var SecuritySponsorship[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\SecuritySponsorship>")
     * @Annotation\SerializedName("sponsoredListings")
     */
    private $sponsoredListings;

    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("logoUrl")
     */
    private $logoUrl;

    /**
     * @var Ceo
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Ceo")
     * @Annotation\SerializedName("ceo")
     */
    private $ceo;
    
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("name")
     */
    private $name;

    /**
     * @var Bond[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\Bond>")
     * @Annotation\SerializedName("issuedBonds")
     */
    private $issuedBonds;

    /**
     * @var Listing
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Listing")
     * @Annotation\SerializedName("listing")
     */
    private $listing;
    
    /**
     * @var SecurityOrderLogEntry[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\SecurityOrderLogEntry>")
     * @Annotation\SerializedName("lastTrades")
     */
    private $lastTrades;

    /**
     * @var EmploymentAgreement
     * @Annotation\Type("Alphatrader\ApiBundle\Model\EmploymentAgreement")
     * @Annotation\SerializedName("ceoEmploymentAgreement")
     */
    private $ceoEmployAgree;

    /**
     * @var CompanyCapabilities
     * @Annotation\Type("Alphatrader\ApiBundle\Model\CompanyCapabilities")
     * @Annotation\SerializedName("companyCapabilities")
     */
    private $companyCapabilities;

    /**
     * @return string
     */
    public function getSecuritiesAccountId()
    {
        return $this->securitiesAccountId;
    }

    /**
     * @param string $securitiesAccountId
     */
    public function setSecuritiesAccountId($securitiesAccountId)
    {
        $this->securitiesAccountId = $securitiesAccountId;
    }

    /**
     * @return ArrayCollection<SecuritySponsorship>
     */
    public function getSponsoredListings()
    {
        return $this->sponsoredListings;
    }

    /**
     * @param SecuritySponsorship[] $sponsoredListings
     */
    public function setSponsoredListings($sponsoredListings)
    {
        $this->sponsoredListings = $sponsoredListings;
    }

    /**
     * @return mixed
     */
    public function getLogoUrl()
    {
        return $this->logoUrl;
    }

    /**
     * @param mixed $logoUrl
     */
    public function setLogoUrl($logoUrl)
    {
        $this->logoUrl = $logoUrl;
    }

    /**
     * @return bool
     */
    public function hasLogo()
    {
        return null != $this->logoUrl;
    }

    /**
     * @return BankAccount
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param BankAccount $bankAccount
     */
    public function setBankAccount(BankAccount $bankAccount)
    {
        $this->bankAccount = $bankAccount;
    }

    /**
     * @return Ceo
     */
    public function getCeo()
    {
        return $this->ceo;
    }

    /**
     * @param Ceo $ceo
     */
    public function setCeo(Ceo $ceo)
    {
        $this->ceo = $ceo;
    }

    /**
     * @return ArrayCollection<Bond>
     */
    public function getIssuedBonds()
    {
        return $this->issuedBonds;
    }

    /**
     * @param Bond[] $issuedBonds
     */
    public function setIssuedBonds($issuedBonds)
    {
        $this->issuedBonds = $issuedBonds;
    }

    /**
     * @return ArrayCollection<SecurityOrderLogEntry>
     */
    public function getLastTrades()
    {
        return $this->lastTrades;
    }

    /**
     * @param mixed $lastTrades
     */
    public function setLastTrades($lastTrades)
    {
        $this->lastTrades = $lastTrades;
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
     * @return EmploymentAgreement
     */
    public function getCeoEmploymentAgreement()
    {
        return $this->ceoEmployAgree;
    }

    /**
     * @param EmploymentAgreement $ceoEmployAgree
     */
    public function setCeoEmploymentAgreement(EmploymentAgreement $ceoEmployAgree)
    {
        $this->ceoEmployAgree = $ceoEmployAgree;
    }

    /**
     * @return CompanyCapabilities
     */
    public function getCompanyCapabilities()
    {
        return $this->companyCapabilities;
    }

    /**
     * @param CompanyCapabilities $companyCapabilities
     */
    public function setCompanyCapabilities(CompanyCapabilities $companyCapabilities)
    {
        $this->companyCapabilities = $companyCapabilities;
    }

    /**
     * @return EmploymentAgreement
     */
    public function getCeoEmployAgree()
    {
        return $this->ceoEmployAgree;
    }

    /**
     * @param EmploymentAgreement $ceoEmployAgree
     */
    public function setCeoEmployAgree($ceoEmployAgree)
    {
        $this->ceoEmployAgree = $ceoEmployAgree;
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    
}
