<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class CompanyCapabilities
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class CompanyCapabilities
{
    /**
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("bank")
     */
    private $bank;

    /**
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("bankReady")
     */
    private $bankReady;

    /**
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("designatedSponsor")
     */
    private $designatedSponsor;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("maxCentralBankLoans")
     */
    private $maxCentralBankLoans;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("reserves")
     */
    private $reserves;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("takenCentralBankLoans")
     */
    private $takenCBLoans;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("netCash")
     */
    private $netCash;
    
    /**
     * @return boolean
     */
    public function isBank()
    {
        return $this->bank;
    }

    /**
     * @param boolean $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
    }

    /**
     * @return boolean
     */
    public function isBankReady()
    {
        return $this->bankReady;
    }

    /**
     * @param boolean $bankReady
     */
    public function setBankReady($bankReady)
    {
        $this->bankReady = $bankReady;
    }

    /**
     * @return boolean
     */
    public function isDesignatedSponsor()
    {
        return $this->designatedSponsor;
    }

    /**
     * @param boolean $designatedSponsor
     */
    public function setDesignatedSponsor($designatedSponsor)
    {
        $this->designatedSponsor = $designatedSponsor;
    }

    /**
     * @return float
     */
    public function getMaxCentralBankLoans()
    {
        return $this->maxCentralBankLoans;
    }

    /**
     * @param float $maxCentralBankLoans
     */
    public function setMaxCentralBankLoans($maxCentralBankLoans)
    {
        $this->maxCentralBankLoans = $maxCentralBankLoans;
    }

    /**
     * @return float
     */
    public function getReserves()
    {
        return $this->reserves;
    }

    /**
     * @param float $reserves
     */
    public function setReserves($reserves)
    {
        $this->reserves = $reserves;
    }

    /**
     * @return float
     */
    public function getTakenCentralBankLoans()
    {
        return $this->takenCBLoans;
    }

    /**
     * @param float $takenCBLoans
     */
    public function setTakenCentralBankLoans($takenCBLoans)
    {
        $this->takenCBLoans = $takenCBLoans;
    }

    /**
     * @return mixed
     */
    public function getNetCash()
    {
        return $this->netCash;
    }

    /**
     * @param mixed $netCash
     */
    public function setNetCash($netCash)
    {
        $this->netCash = $netCash;
    }
}
