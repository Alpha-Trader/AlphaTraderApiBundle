<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class CentralBankReserve
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class CentralBankReserve
{
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\BankingLicense")
     * @Annotation\SerializedName("bankingLicense")
     */
    private $bankingLicense;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("cashHolding")
     */
    private $cashHolding;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("maxCentralBankLoans")
     */
    private $maxCentralBankLoans;

    /**
     * @return BankingLicense
     */
    public function getBankingLicense()
    {
        return $this->bankingLicense;
    }

    /**
     * @param BankingLicense $bankingLicense
     */
    public function setBankingLicense($bankingLicense)
    {
        $this->bankingLicense = $bankingLicense;
    }

    /**
     * @return mixed
     */
    public function getCashHolding()
    {
        return $this->cashHolding;
    }

    /**
     * @param mixed $cashHolding
     */
    public function setCashHolding($cashHolding)
    {
        $this->cashHolding = $cashHolding;
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
    public function getMaxCentralBankLoans()
    {
        return $this->maxCentralBankLoans;
    }

    /**
     * @param mixed $maxCentralBankLoans
     */
    public function setMaxCentralBankLoans($maxCentralBankLoans)
    {
        $this->maxCentralBankLoans = $maxCentralBankLoans;
    }
}
