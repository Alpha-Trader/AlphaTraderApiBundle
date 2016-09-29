<?php
/**
 * User: ljbergmann
 * Date: 29.09.16 18:56
 */

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use Alphatrader\ApiBundle\Model\CentralBankReserve;


class CentralBankReserveTest extends TestCase{

    public function testId(){
        $centralBankReserve = new CentralBankReserve();
        $this->assertNull($centralBankReserve->getId());

        $uuid = uniqid();
        $centralBankReserve->setId($uuid);
        $this->assertEquals($uuid,$centralBankReserve->getId());
        $this->assertTrue(is_string($centralBankReserve->getId()));
    }

    public function testBaningLicense(){
        $centralBankReserve = new CentralBankReserve();
        $this->assertNull($centralBankReserve->getBankingLicense());
        
        // Given
        $bankingLicense = $this->createMock('Alphatrader\ApiBundle\Model\BankingLicense');
        $company = $this->createMock('Alphatrader\ApiBundle\Model\CompactCompany');

        $bankingLicense->expects($this->any())->method('getId')->will($this->returnValue(uniqid()));
        $bankingLicense->expects($this->any())->method('getCompany')->will($this->returnValue($company));
        
        //When
        $centralBankReserve->setBankingLicense($bankingLicense);
        
        //Then
        $this->assertInstanceOf('AlphaTrader\ApiBundle\Model\BankingLicense',$centralBankReserve->getBankingLicense());
    }
    
    public function testCashHolding(){
        $centralBankReserve = new CentralBankReserve();
        $this->assertNull($centralBankReserve->getCashHolding());

        $cash = mt_rand(1,50000)+(mt_rand() / mt_getrandmax());
        $centralBankReserve->setCashHolding($cash);
        $this->assertEquals($cash,$centralBankReserve->getCashHolding());
        $this->assertTrue(is_float($centralBankReserve->getCashHolding()));
    }
    
    public function testMaxCentralBankLoans(){
        $centralBankReserve = new CentralBankReserve();
        $this->assertNull($centralBankReserve->getMaxCentralBankLoans());

        $cash = mt_rand(1,50000)+(mt_rand() / mt_getrandmax());
        $centralBankReserve->setMaxCentralBankLoans($cash);
        $this->assertEquals($cash,$centralBankReserve->getMaxCentralBankLoans());
        $this->assertTrue(is_float($centralBankReserve->getMaxCentralBankLoans()));
    }

    /*
    * @param $length
    */
    private function getRandomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
    
}