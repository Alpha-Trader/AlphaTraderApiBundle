<?php

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\MarketStatistics;

/**
 * Class MarketStatisticsTest
 * @package Tests\Model
 */

class MarketStatisticsTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testId()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getId());

        $id = uniqid();
        $complaint->setId($id);

        $this->assertEquals($id, $complaint->getId());
    }

    public function testPrivateCash()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getPrivateCash());

        $float = $this->getRandomFloat();
        $complaint->setPrivateCash($float);

        $this->assertTrue(is_float($complaint->getPrivateCash()));
        $this->assertEquals($float, $complaint->getPrivateCash());
    }

    public function testAverageBondDurationInDays()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getAverageBondDurationInDays());

        $float = $this->getRandomFloat();
        $complaint->setAverageBondDurationInDays($float);

        $this->assertTrue(is_float($complaint->getAverageBondDurationInDays()));
        $this->assertEquals($float, $complaint->getAverageBondDurationInDays());
    }

    public function testAverageBookValue()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getAverageBookValue());

        $float = $this->getRandomFloat();
        $complaint->setAverageBookValue($float);

        $this->assertTrue(is_float($complaint->getAverageBookValue()));
        $this->assertEquals($float, $complaint->getAverageBookValue());
    }

    public function testAverageDailyWage()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getAverageDailyWage());

        $float = $this->getRandomFloat();
        $complaint->setAverageDailyWage($float);

        $this->assertTrue(is_float($complaint->getAverageDailyWage()));
        $this->assertEquals($float, $complaint->getAverageDailyWage());
    }

    public function testAverageDesignatedSponsorRating()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getAverageDesignatedSponsorRating());

        $float = $this->getRandomFloat();
        $complaint->setAverageDesignatedSponsorRating($float);

        $this->assertTrue(is_float($complaint->getAverageDesignatedSponsorRating()));
        $this->assertEquals($float, $complaint->getAverageDesignatedSponsorRating());
    }

    public function testAverageYieldToMaturity()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getAverageYieldToMaturity());

        $float = $this->getRandomFloat();
        $complaint->setAverageYieldToMaturity($float);

        $this->assertTrue(is_float($complaint->getAverageYieldToMaturity()));
        $this->assertEquals($float, $complaint->getAverageYieldToMaturity());
    }

    public function testBondFaceVolume()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getBondFaceVolume());

        $float = $this->getRandomFloat();
        $complaint->setBondFaceVolume($float);

        $this->assertTrue(is_float($complaint->getBondFaceVolume()));
        $this->assertEquals($float, $complaint->getBondFaceVolume());
    }

    public function testCentralBankReserves()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getCentralBankReserves());

        $float = $this->getRandomFloat();
        $complaint->setCentralBankReserves($float);

        $this->assertTrue(is_float($complaint->getCentralBankReserves()));
        $this->assertEquals($float, $complaint->getCentralBankReserves());
    }

    public function testCommittedCash()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getCommittedCash());

        $float = $this->getRandomFloat();
        $complaint->setCommittedCash($float);

        $this->assertTrue(is_float($complaint->getCommittedCash()));
        $this->assertEquals($float, $complaint->getCommittedCash());
    }

    public function testCorporateCash()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getCorporateCash());

        $float = $this->getRandomFloat();
        $complaint->setCorporateCash($float);

        $this->assertTrue(is_float($complaint->getCorporateCash()));
        $this->assertEquals($float, $complaint->getCorporateCash());
    }

    public function testMainInterestRate()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getMainInterestRate());

        $float = $this->getRandomFloat();
        $complaint->setMainInterestRate($float);

        $this->assertTrue(is_float($complaint->getMainInterestRate()));
        $this->assertEquals($float, $complaint->getMainInterestRate());
    }

    public function testMarketCap()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getMarketCap());

        $float = $this->getRandomFloat();
        $complaint->setMarketCap($float);

        $this->assertTrue(is_float($complaint->getMarketCap()));
        $this->assertEquals($float, $complaint->getMarketCap());
    }

    public function testNumberOfActiveOtherListings()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfActiveOtherListings());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfActiveOtherListings($float);

        $this->assertTrue(is_int($complaint->getNumberOfActiveOtherListings()));
        $this->assertEquals($float, $complaint->getNumberOfActiveOtherListings());
    }

    public function testNumberOfBanks()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfBanks());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfBanks($float);

        $this->assertTrue(is_int($complaint->getNumberOfBanks()));
        $this->assertEquals($float, $complaint->getNumberOfBanks());
    }

    public function testNumberOfBondOrders()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfBondOrders());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfBondOrders($float);

        $this->assertTrue(is_int($complaint->getNumberOfBondOrders()));
        $this->assertEquals($float, $complaint->getNumberOfBondOrders());
    }

    public function testNumberOfCashoutPolls()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfCashoutPolls());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfCashoutPolls($float);

        $this->assertTrue(is_int($complaint->getNumberOfCashoutPolls()));
        $this->assertEquals($float, $complaint->getNumberOfCashoutPolls());
    }

    public function testNumberOfCommittedShares()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfCommittedShares());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfCommittedShares($float);

        $this->assertTrue(is_int($complaint->getNumberOfCommittedShares()));
        $this->assertEquals($float, $complaint->getNumberOfCommittedShares());
    }

    public function testNumberOfCompanies()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfCompanies());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfCompanies($float);

        $this->assertTrue(is_int($complaint->getNumberOfCompanies()));
        $this->assertEquals($float, $complaint->getNumberOfCompanies());
    }

    public function testNumberOfDesignatedSponsors()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfDesignatedSponsors());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfDesignatedSponsors($float);

        $this->assertTrue(is_int($complaint->getNumberOfDesignatedSponsors()));
        $this->assertEquals($float, $complaint->getNumberOfDesignatedSponsors());
    }

    public function testNumberOfLiquidationPolls()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfLiquidationPolls());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfLiquidationPolls($float);

        $this->assertTrue(is_int($complaint->getNumberOfLiquidationPolls()));
        $this->assertEquals($float, $complaint->getNumberOfLiquidationPolls());
    }

    public function testNumberOfOrders()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfOrders());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfOrders($float);

        $this->assertTrue(is_int($complaint->getNumberOfOrders()));
        $this->assertEquals($float, $complaint->getNumberOfOrders());
    }

    public function testNumberOfOrders24h()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfOrders24h());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfOrders24h($float);

        $this->assertTrue(is_int($complaint->getNumberOfOrders24h()));
        $this->assertEquals($float, $complaint->getNumberOfOrders24h());
    }

    public function testNumberOfOtcOrders()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfOtcOrders());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfOtcOrders($float);

        $this->assertTrue(is_int($complaint->getNumberOfOtcOrders()));
        $this->assertEquals($float, $complaint->getNumberOfOtcOrders());
    }

    public function testNumberOfOtherListings()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfOtherListings());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfOtherListings($float);

        $this->assertTrue(is_int($complaint->getNumberOfOtherListings()));
        $this->assertEquals($float, $complaint->getNumberOfOtherListings());
    }

    public function testNumberOfOtherOrders()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfOtherOrders());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfOtherOrders($float);

        $this->assertTrue(is_int($complaint->getNumberOfOtherOrders()));
        $this->assertEquals($float, $complaint->getNumberOfOtherOrders());
    }

    public function testNumberOfPartnerUsers()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfPartnerUsers());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfPartnerUsers($float);

        $this->assertTrue(is_int($complaint->getNumberOfPartnerUsers()));
        $this->assertEquals($float, $complaint->getNumberOfPartnerUsers());
    }

    public function testNumberOfPremiumUsers()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfPremiumUsers());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfPremiumUsers($float);

        $this->assertTrue(is_int($complaint->getNumberOfPremiumUsers()));
        $this->assertEquals($float, $complaint->getNumberOfPremiumUsers());
    }

    public function testNumberOfRepoOrders()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfRepoOrders());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfRepoOrders($float);

        $this->assertTrue(is_int($complaint->getNumberOfRepoOrders()));
        $this->assertEquals($float, $complaint->getNumberOfRepoOrders());
    }

    public function testNumberOfStockOrders()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfStockOrders());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfStockOrders($float);

        $this->assertTrue(is_int($complaint->getNumberOfStockOrders()));
        $this->assertEquals($float, $complaint->getNumberOfStockOrders());
    }

    public function testNumberOfSystemBondOrders()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfSystemBondOrders());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfSystemBondOrders($float);

        $this->assertTrue(is_int($complaint->getNumberOfSystemBondOrders()));
        $this->assertEquals($float, $complaint->getNumberOfSystemBondOrders());
    }

    public function testNumberOfSystemRepoOrders()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfSystemRepoOrders());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfSystemRepoOrders($float);

        $this->assertTrue(is_int($complaint->getNumberOfSystemRepoOrders()));
        $this->assertEquals($float, $complaint->getNumberOfSystemRepoOrders());
    }

    public function testNumberOfUsers()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getNumberOfUsers());

        $float = $this->getRandomInteger();
        $complaint->setNumberOfUsers($float);

        $this->assertTrue(is_int($complaint->getNumberOfUsers()));
        $this->assertEquals($float, $complaint->getNumberOfUsers());
    }

    public function testOrderVolume()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getOrderVolume());

        $float = $this->getRandomFloat();
        $complaint->setOrderVolume($float);

        $this->assertTrue(is_float($complaint->getOrderVolume()));
        $this->assertEquals($float, $complaint->getOrderVolume());
    }

    public function testOrderVolume24h()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getOrderVolume24h());

        $float = $this->getRandomFloat();
        $complaint->setOrderVolume24h($float);

        $this->assertTrue(is_float($complaint->getOrderVolume24h()));
        $this->assertEquals($float, $complaint->getOrderVolume24h());
    }

    public function testSystemBondFaceVolume()
    {
        $complaint = new MarketStatistics();
        $this->assertNull($complaint->getSystemBondFaceVolume());

        $float = $this->getRandomFloat();
        $complaint->setSystemBondFaceVolume($float);

        $this->assertTrue(is_float($complaint->getSystemBondFaceVolume()));
        $this->assertEquals($float, $complaint->getSystemBondFaceVolume());
    }
}
