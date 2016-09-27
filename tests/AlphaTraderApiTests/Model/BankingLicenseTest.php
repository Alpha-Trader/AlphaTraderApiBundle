<?php
/**
 * Created by IntelliJ IDEA.
 * User: ljbergmann
 * Date: 26.09.16 01:47
 */

namespace Tests;

use \Alphatrader\ApiBundle\Model\BankingLicense;
use PHPUnit\Framework\TestCase;

class BankingLicenseTest extends TestCase{

    public function testId(){
        $bankLicense = new BankingLicense();
        $this->assertNull($bankLicense->getId());

        $uuid = uniqid();

        $bankLicense->setId($uuid);
        $this->assertEquals($uuid,$bankLicense->getId());
        $this->assertTrue(is_string($bankLicense->getId()));
    }

    public function testCompany(){
        $bankLicense = new BankingLicense();
        $this->assertNull($bankLicense->getCompany());
    }
}