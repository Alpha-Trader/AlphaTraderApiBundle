<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Message
 *
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 * @author ljbergmann <l.bergmann@sky-lab.de>
 * @SuppressWarnings(PHPMD)
 */
class MarketStatistics
{
    use DateTrait;
    
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("averageBondDurationInDays")
     */
    private $averageBondDurationInDays;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("averageBookValue")
     */
    private $averageBookValue;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("averageDailyWage")
     */
    private $averageDailyWage;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("averageDesignatedSponsorRating")
     */
    private $averageDesignatedSponsorRating;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("averageYieldToMaturity")
     */
    private $averageYieldToMaturity;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("bondFaceVolume")
     */
    private $bondFaceVolume;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("centralBankReserves")
     */
    private $centralBankReserves;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("committedCash")
     */
    private $committedCash;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("corporateCash")
     */
    private $corporateCash;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("mainInterestRate")
     */
    private $mainInterestRate;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("marketCap")
     */
    private $marketCap;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfActiveOtherListings")
     */
    private $numberOfActiveOtherListings;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfBanks")
     */
    private $numberOfBanks;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfBondOrders")
     */
    private $numberOfBondOrders;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfCashoutPolls")
     */
    private $numberOfCashoutPolls;
    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfCommittedShares")
     */
    private $numberOfCommittedShares;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfCompanies")
     */
    private $numberOfCompanies;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfDesignatedSponsors")
     */
    private $numberOfDesignatedSponsors;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfLiquidationPolls")
     */
    private $numberOfLiquidationPolls;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfOrders")
     */
    private $numberOfOrders;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfOrders24h")
     */
    private $numberOfOrders24h;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfOtcOrders")
     */
    private $numberOfOtcOrders;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfOtherListings")
     */
    private $numberOfOtherListings;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfOtherOrders")
     */
    private $numberOfOtherOrders;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfPartnerUsers")
     */
    private $numberOfPartnerUsers;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfPremiumUsers")
     */
    private $numberOfPremiumUsers;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfBondOrders")
     */
    private $numberOfRepoOrders;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfStockOrders")
     */
    private $numberOfStockOrders;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfSystemBondOrders")
     */
    private $numberOfSystemBondOrders;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfSystemRepoOrders")
     */
    private $numberOfSystemRepoOrders;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfUsers")
     */
    private $numberOfUsers;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("orderVolume;")
     */
    private $orderVolume;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("orderVolume24h")
     */
    private $orderVolume24h;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("privateCash")
     */
    private $privateCash;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("systemBondFaceVolume")
     */
    private $systemBondFaceVolume;

    /**
     * @return float
     */
    public function getPrivateCash()
    {
        return $this->privateCash;
    }

    /**
     * @param float $privateCash
     */
    public function setPrivateCash($privateCash)
    {
        $this->privateCash = $privateCash;
    }

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
     * @return float
     */
    public function getAverageBondDurationInDays()
    {
        return $this->averageBondDurationInDays;
    }

    /**
     * @param float $averageBondDurationInDays
     */
    public function setAverageBondDurationInDays($averageBondDurationInDays)
    {
        $this->averageBondDurationInDays = $averageBondDurationInDays;
    }

    /**
     * @return float
     */
    public function getAverageBookValue()
    {
        return $this->averageBookValue;
    }

    /**
     * @param float $averageBookValue
     */
    public function setAverageBookValue($averageBookValue)
    {
        $this->averageBookValue = $averageBookValue;
    }

    /**
     * @return float
     */
    public function getAverageDailyWage()
    {
        return $this->averageDailyWage;
    }

    /**
     * @param float $averageDailyWage
     */
    public function setAverageDailyWage($averageDailyWage)
    {
        $this->averageDailyWage = $averageDailyWage;
    }

    /**
     * @return string
     */
    public function getAverageDesignatedSponsorRating()
    {
        return $this->averageDesignatedSponsorRating;
    }

    /**
     * @param string $averageDesignatedSponsorRating
     */
    public function setAverageDesignatedSponsorRating($averageDesignatedSponsorRating)
    {
        $this->averageDesignatedSponsorRating = $averageDesignatedSponsorRating;
    }

    /**
     * @return float
     */
    public function getAverageYieldToMaturity()
    {
        return $this->averageYieldToMaturity;
    }

    /**
     * @param float $averageYieldToMaturity
     */
    public function setAverageYieldToMaturity($averageYieldToMaturity)
    {
        $this->averageYieldToMaturity = $averageYieldToMaturity;
    }

    /**
     * @return float
     */
    public function getBondFaceVolume()
    {
        return $this->bondFaceVolume;
    }

    /**
     * @param float $bondFaceVolume
     */
    public function setBondFaceVolume($bondFaceVolume)
    {
        $this->bondFaceVolume = $bondFaceVolume;
    }

    /**
     * @return float
     */
    public function getCentralBankReserves()
    {
        return $this->centralBankReserves;
    }

    /**
     * @param float $centralBankReserves
     */
    public function setCentralBankReserves($centralBankReserves)
    {
        $this->centralBankReserves = $centralBankReserves;
    }

    /**
     * @return float
     */
    public function getCommittedCash()
    {
        return $this->committedCash;
    }

    /**
     * @param float $committedCash
     */
    public function setCommittedCash($committedCash)
    {
        $this->committedCash = $committedCash;
    }

    /**
     * @return float
     */
    public function getCorporateCash()
    {
        return $this->corporateCash;
    }

    /**
     * @param float $corporateCash
     */
    public function setCorporateCash($corporateCash)
    {
        $this->corporateCash = $corporateCash;
    }

    /**
     * @return float
     */
    public function getMainInterestRate()
    {
        return $this->mainInterestRate;
    }

    /**
     * @param float $mainInterestRate
     */
    public function setMainInterestRate($mainInterestRate)
    {
        $this->mainInterestRate = $mainInterestRate;
    }

    /**
     * @return float
     */
    public function getMarketCap()
    {
        return $this->marketCap;
    }

    /**
     * @param float $marketCap
     */
    public function setMarketCap($marketCap)
    {
        $this->marketCap = $marketCap;
    }

    /**
     * @return int
     */
    public function getNumberOfActiveOtherListings()
    {
        return $this->numberOfActiveOtherListings;
    }

    /**
     * @param int $numberOfActiveOtherListings
     */
    public function setNumberOfActiveOtherListings($numberOfActiveOtherListings)
    {
        $this->numberOfActiveOtherListings = $numberOfActiveOtherListings;
    }

    /**
     * @return int
     */
    public function getNumberOfBanks()
    {
        return $this->numberOfBanks;
    }

    /**
     * @param int $numberOfBanks
     */
    public function setNumberOfBanks($numberOfBanks)
    {
        $this->numberOfBanks = $numberOfBanks;
    }

    /**
     * @return int
     */
    public function getNumberOfBondOrders()
    {
        return $this->numberOfBondOrders;
    }

    /**
     * @param int $numberOfBondOrders
     */
    public function setNumberOfBondOrders($numberOfBondOrders)
    {
        $this->numberOfBondOrders = $numberOfBondOrders;
    }

    /**
     * @return int
     */
    public function getNumberOfCashoutPolls()
    {
        return $this->numberOfCashoutPolls;
    }

    /**
     * @param int $numberOfCashoutPolls
     */
    public function setNumberOfCashoutPolls($numberOfCashoutPolls)
    {
        $this->numberOfCashoutPolls = $numberOfCashoutPolls;
    }

    /**
     * @return int
     */
    public function getNumberOfCommittedShares()
    {
        return $this->numberOfCommittedShares;
    }

    /**
     * @param int $numberOfCommittedShares
     */
    public function setNumberOfCommittedShares($numberOfCommittedShares)
    {
        $this->numberOfCommittedShares = $numberOfCommittedShares;
    }

    /**
     * @return int
     */
    public function getNumberOfCompanies()
    {
        return $this->numberOfCompanies;
    }

    /**
     * @param int $numberOfCompanies
     */
    public function setNumberOfCompanies($numberOfCompanies)
    {
        $this->numberOfCompanies = $numberOfCompanies;
    }

    /**
     * @return int
     */
    public function getNumberOfDesignatedSponsors()
    {
        return $this->numberOfDesignatedSponsors;
    }

    /**
     * @param int $numberOfDesignatedSponsors
     */
    public function setNumberOfDesignatedSponsors($numberOfDesignatedSponsors)
    {
        $this->numberOfDesignatedSponsors = $numberOfDesignatedSponsors;
    }

    /**
     * @return int
     */
    public function getNumberOfLiquidationPolls()
    {
        return $this->numberOfLiquidationPolls;
    }

    /**
     * @param int $numberOfLiquidationPolls
     */
    public function setNumberOfLiquidationPolls($numberOfLiquidationPolls)
    {
        $this->numberOfLiquidationPolls = $numberOfLiquidationPolls;
    }

    /**
     * @return int
     */
    public function getNumberOfOrders()
    {
        return $this->numberOfOrders;
    }

    /**
     * @param int $numberOfOrders
     */
    public function setNumberOfOrders($numberOfOrders)
    {
        $this->numberOfOrders = $numberOfOrders;
    }

    /**
     * @return int
     */
    public function getNumberOfOrders24h()
    {
        return $this->numberOfOrders24h;
    }

    /**
     * @param int $numberOfOrders24h
     */
    public function setNumberOfOrders24h($numberOfOrders24h)
    {
        $this->numberOfOrders24h = $numberOfOrders24h;
    }

    /**
     * @return int
     */
    public function getNumberOfOtcOrders()
    {
        return $this->numberOfOtcOrders;
    }

    /**
     * @param int $numberOfOtcOrders
     */
    public function setNumberOfOtcOrders($numberOfOtcOrders)
    {
        $this->numberOfOtcOrders = $numberOfOtcOrders;
    }

    /**
     * @return int
     */
    public function getNumberOfOtherListings()
    {
        return $this->numberOfOtherListings;
    }

    /**
     * @param int $numberOfOtherListings
     */
    public function setNumberOfOtherListings($numberOfOtherListings)
    {
        $this->numberOfOtherListings = $numberOfOtherListings;
    }

    /**
     * @return int
     */
    public function getNumberOfOtherOrders()
    {
        return $this->numberOfOtherOrders;
    }

    /**
     * @param int $numberOfOtherOrders
     */
    public function setNumberOfOtherOrders($numberOfOtherOrders)
    {
        $this->numberOfOtherOrders = $numberOfOtherOrders;
    }

    /**
     * @return int
     */
    public function getNumberOfPartnerUsers()
    {
        return $this->numberOfPartnerUsers;
    }

    /**
     * @param int $numberOfPartnerUsers
     */
    public function setNumberOfPartnerUsers($numberOfPartnerUsers)
    {
        $this->numberOfPartnerUsers = $numberOfPartnerUsers;
    }

    /**
     * @return int
     */
    public function getNumberOfPremiumUsers()
    {
        return $this->numberOfPremiumUsers;
    }

    /**
     * @param int $numberOfPremiumUsers
     */
    public function setNumberOfPremiumUsers($numberOfPremiumUsers)
    {
        $this->numberOfPremiumUsers = $numberOfPremiumUsers;
    }

    /**
     * @return int
     */
    public function getNumberOfRepoOrders()
    {
        return $this->numberOfRepoOrders;
    }

    /**
     * @param int $numberOfRepoOrders
     */
    public function setNumberOfRepoOrders($numberOfRepoOrders)
    {
        $this->numberOfRepoOrders = $numberOfRepoOrders;
    }

    /**
     * @return int
     */
    public function getNumberOfStockOrders()
    {
        return $this->numberOfStockOrders;
    }

    /**
     * @param int $numberOfStockOrders
     */
    public function setNumberOfStockOrders($numberOfStockOrders)
    {
        $this->numberOfStockOrders = $numberOfStockOrders;
    }

    /**
     * @return int
     */
    public function getNumberOfSystemBondOrders()
    {
        return $this->numberOfSystemBondOrders;
    }

    /**
     * @param int $numberOfSystemBondOrders
     */
    public function setNumberOfSystemBondOrders($numberOfSystemBondOrders)
    {
        $this->numberOfSystemBondOrders = $numberOfSystemBondOrders;
    }

    /**
     * @return int
     */
    public function getNumberOfSystemRepoOrders()
    {
        return $this->numberOfSystemRepoOrders;
    }

    /**
     * @param int $numberOfSystemRepoOrders
     */
    public function setNumberOfSystemRepoOrders($numberOfSystemRepoOrders)
    {
        $this->numberOfSystemRepoOrders = $numberOfSystemRepoOrders;
    }

    /**
     * @return int
     */
    public function getNumberOfUsers()
    {
        return $this->numberOfUsers;
    }

    /**
     * @param int $numberOfUsers
     */
    public function setNumberOfUsers($numberOfUsers)
    {
        $this->numberOfUsers = $numberOfUsers;
    }

    /**
     * @return float
     */
    public function getOrderVolume()
    {
        return $this->orderVolume;
    }

    /**
     * @param float $orderVolume
     */
    public function setOrderVolume($orderVolume)
    {
        $this->orderVolume = $orderVolume;
    }

    /**
     * @return float
     */
    public function getOrderVolume24h()
    {
        return $this->orderVolume24h;
    }

    /**
     * @param float $orderVolume24h
     */
    public function setOrderVolume24h($orderVolume24h)
    {
        $this->orderVolume24h = $orderVolume24h;
    }

    /**
     * @return float
     */
    public function getSystemBondFaceVolume()
    {
        return $this->systemBondFaceVolume;
    }

    /**
     * @param float $systemBondFaceVolume
     */
    public function setSystemBondFaceVolume($systemBondFaceVolume)
    {
        $this->systemBondFaceVolume = $systemBondFaceVolume;
    }
}
