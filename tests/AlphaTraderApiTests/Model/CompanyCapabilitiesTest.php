<?php
/**
 * User: ljbergmann
 * Date: 29.09.16 21:32
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\CompanyCapabilities;

/**
 * Class CompanyCapabilitiesTest
 * @package Tests\Model
 * @author ljbergmann
 */

class CompanyCapabilitiesTest extends \PHPUnit_Framework_TestCase
{
    public function testBank()
    {
        $cc = new CompanyCapabilities();
        $this->assertNull($cc->isBank());

        $bank = (bool)mt_rand(0, 1);
        $cc->setBank($bank);

        $this->assertEquals($bank, $cc->isBank());
        $this->assertTrue(is_bool($cc->isBank()));
    }

    public function testBankReady()
    {
        $cc = new CompanyCapabilities();
        $this->assertNull($cc->isBankReady());

        $bankReady = (bool)mt_rand(0, 1);
        $cc->setBankReady($bankReady);

        $this->assertEquals($bankReady, $cc->isBankReady());
        $this->assertTrue(is_bool($cc->isBankReady()));
    }

    public function testDesignatedSponsor()
    {
        $cc = new CompanyCapabilities();
        $this->assertNull($cc->isDesignatedSponsor());

        $designatedSponsor = (bool)mt_rand(0, 1);
        $cc->setDesignatedSponsor($designatedSponsor);

        $this->assertEquals($designatedSponsor, $cc->isDesignatedSponsor());
        $this->assertTrue(is_bool($cc->isDesignatedSponsor()));
    }

    public function testMaxCentralBankLoans()
    {
        $cc = new CompanyCapabilities();
        $this->assertNull($cc->getMaxCentralBankLoans());

        $max = mt_rand(1, 500000000) + (rand()/mt_getrandmax());

        $cc->setMaxCentralBankLoans($max);

        $this->assertEquals($max, $cc->getMaxCentralBankLoans());
        $this->assertTrue(is_float($cc->getMaxCentralBankLoans()));
    }

    public function testReserves()
    {
        $cc = new CompanyCapabilities();
        $this->assertNull($cc->getReserves());

        $reserves = mt_rand(500, 50000000)+ (rand()/mt_getrandmax());

        $cc->setReserves($reserves);

        $this->assertTrue(is_float($cc->getReserves()));
        $this->assertEquals($reserves, $cc->getReserves());
    }

    public function testTakenCBLoans()
    {
        $cc = new CompanyCapabilities();
        $this->assertNull($cc->getTakenCentralBankLoans());

        $takenCBLoans = mt_rand(500, 50000000)+ (rand()/mt_getrandmax());

        $cc->setTakenCentralBankLoans($takenCBLoans);

        $this->assertTrue(is_float($cc->getTakenCentralBankLoans()));
        $this->assertEquals($takenCBLoans, $cc->getTakenCentralBankLoans());
    }

    public function testNetCash()
    {
        $cc = new CompanyCapabilities();
        $this->assertNull($cc->getNetCash());

        $netCash = mt_rand(500, 50000000)+ (rand()/mt_getrandmax());

        $cc->setNetCash($netCash);

        $this->assertTrue(is_float($cc->getNetCash()));
        $this->assertEquals($netCash, $cc->getNetCash());
    }
}
