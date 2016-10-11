<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 16:03
 */

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Shareholder
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Shareholder
{
    /**
     * @var CompactCompany
     * @Annotation\Type("Alphatrader\ApiBundle\Model\CompactCompany")
     * @Annotation\SerializedName("company")
     */
    private $company;
    /**
     * @var int
     * @Annotation\Type("int")
     * @Annotation\SerializedName("numberOfShares")
     */
    private $numberOfShares;
    /**
     * @var int
     * @Annotation\Type("int")
     * @Annotation\SerializedName("outstandingShares")
     */
    private $outstandingShares;
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("securityIdentifier")
     */
    private $securityIdentifier;
    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("shareInPercent")
     */
    private $shareInPercent;

    /**
     * @return CompactCompany
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param CompactCompany $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return int
     */
    public function getNumberOfShares()
    {
        return $this->numberOfShares;
    }

    /**
     * @param int $numberOfShares
     */
    public function setNumberOfShares($numberOfShares)
    {
        $this->numberOfShares = $numberOfShares;
    }

    /**
     * @return int
     */
    public function getOutstandingShares()
    {
        return $this->outstandingShares;
    }

    /**
     * @param int $outstandingShares
     */
    public function setOutstandingShares($outstandingShares)
    {
        $this->outstandingShares = $outstandingShares;
    }

    /**
     * @return string
     */
    public function getSecurityIdentifier()
    {
        return $this->securityIdentifier;
    }

    /**
     * @param string $securityIdentifier
     */
    public function setSecurityIdentifier($securityIdentifier)
    {
        $this->securityIdentifier = $securityIdentifier;
    }

    /**
     * @return float
     */
    public function getShareInPercent()
    {
        return $this->shareInPercent;
    }

    /**
     * @param float $shareInPercent
     */
    public function setShareInPercent($shareInPercent)
    {
        $this->shareInPercent = $shareInPercent;
    }
}
