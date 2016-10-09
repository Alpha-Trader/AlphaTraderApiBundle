<?php
/**
 * User: ljbergmann
 * Date: 05.10.16 00:45
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\EmploymentAgreementCompactCompany;

/**
 * Class EmploymentAgreementCompactCompanyTest
 * @package AlphaTraderApiTests\Model
 */

class EmploymentAgreementCompactCompanyTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testId()
    {
        $eacc = new EmploymentAgreementCompactCompany();
        $this->assertNull($eacc->getId());

        $uuid = uniqid();

        $eacc->setId($uuid);
        $this->assertTrue(is_string($eacc->getId()));
        $this->assertEquals($uuid, $eacc->getId());
    }

    public function testCompany()
    {
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

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\CompactCompany', $eacc->getCompany());
    }

    public function testDailyWage()
    {
        $eacc = new EmploymentAgreementCompactCompany();
        $this->assertNull($eacc->getDailyWage());
        
        $wage = $this->getRandomFloat(200);
        
        $eacc->setDailyWage($wage);
        
        $this->assertTrue(is_float($eacc->getDailyWage()));
        $this->assertEquals($wage, $eacc->getDailyWage());
    }
}
