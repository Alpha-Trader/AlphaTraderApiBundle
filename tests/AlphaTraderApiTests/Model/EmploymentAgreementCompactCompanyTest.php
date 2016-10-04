<?php
/**
 * User: ljbergmann
 * Date: 05.10.16 00:45
 */

namespace AlphaTraderApiTests\Model;

use Alphatrader\ApiBundle\Model\EmploymentAgreementCompactCompany;

/**
 * Class EmploymentAgreementCompactCompanyTest
 * @package AlphaTraderApiTests\Model
 */

class EmploymentAgreementCompactCompanyTest extends \PHPUnit_Framework_TestCase
{
    public function testId(){
        $eacc = new EmploymentAgreementCompactCompany();
        $this->assertNull($eacc->getId());

        $uuid = uniqid();

        $eacc->setId($uuid);
        $this->assertTrue(is_string($eacc->getId()));
        $this->assertEquals($uuid,$eacc->getId());
    }

    public function testCompany(){
        $eacc = new EmploymentAgreementCompactCompany();
        $this->assertNull($eacc->getCompany());

        $company = $this->createMock('Alphatrader\ApiBundle\Model\CompactCompany');
        $ceo     = $this->createMock('Alphatrader\ApiBundle\Model\UserName');

        $company->expects($this->any())->method('getId')->willReturn($this->getRandomString(12));
        $company->expects($this->any())->method('getCeo')->willReturn($ceo);
        $company->expects($this->any())->method('getName')->willReturn($this->getRandomString(12));
        $company->expects($this->any())->method('getSecurityIdentifier')->willReturn($this->getRandomString(12));
        $company->expects($this->any())->method('getSecuritiesAccountId')->willReturn($this->getRandomString(12));

        $eacc->setCompany($company);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\CompactCompany',$eacc->getCompany());
    }

    public function testDailyWage(){
        $eacc = new EmploymentAgreementCompactCompany();
        $this->assertNull($eacc->getDailyWage());
        
        $wage = $this->getRandomFloat(200);
        
        $eacc->setDailyWage($wage);
        
        $this->assertTrue(is_float($eacc->getDailyWage()));
        $this->assertEquals($wage,$eacc->getDailyWage());
    }
    
    /**
     * @param int $min
     * @param int $max
     * @return mixed
     */
    private function getRandomFloat($min=1,$max=50000000){
        return mt_rand($min,$max) + (rand()/mt_getrandmax());
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
