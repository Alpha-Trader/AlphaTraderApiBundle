<?php
/**
 * User: ljbergmann
 * Date: 29.09.16 20:46
 */

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use Alphatrader\ApiBundle\Model\CompactCompany;
/**
 * Class CompactCompany
 * @package Tests\Model
 * @author ljbergmann
 */
class CompactCompanyTest extends TestCase
{
    public function testId(){
        $company = new CompactCompany();
        $this->assertNull($company->getId());

        $uuid = uniqid();

        $company->setId($uuid);
        $this->assertEquals($uuid,$company->getId());
        $this->assertTrue(is_string($company->getId()));
    }

    public function testCeo()
    {
        $company = new CompactCompany();
        $this->assertNull($company->getCeo());

        $date = new \DateTime();
        $ceo = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        $usercaps = $this->createMock('Alphatrader\ApiBundle\Model\UserCapabilities');
        
        $usercaps->expects($this->any())->method('isLevel2User')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getLevel2UserEndDate')->will($this->returnValue($date));
        $usercaps->expects($this->any())->method('getLocale')->will($this->returnValue('en_US'));
        $usercaps->expects($this->any())->method('isPartner')->will($this->returnValue(false));
        $usercaps->expects($this->any())->method('getPartnerId')->will($this->returnValue($this->getRandomString()));
        $usercaps->expects($this->any())->method('hasPremium')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getPremiumEndDate')->will($this->returnValue($date));

        $ceo->expects($this->any())->method('getId')->will($this->returnValue($this->getRandomString()));
        $ceo->expects($this->any())->method('getUsername')->will($this->returnValue($this->getRandomString()));
        $ceo->expects($this->any())->method('getGravatarHash')->will($this->returnValue($this->getRandomString(25)));
        $ceo->expects($this->any())->method('getUserCapabilities')->will($this->returnValue($usercaps));
        
        $company->setCeo($ceo);
        
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserName',$company->getCeo());
    }
    
    public function testName(){
        $company = new CompactCompany();
        $this->assertNull($company->getName());
        
        $username = $this->getRandomString(12);
        
        $company->setName($username);
        
        $this->assertEquals($username,$company->getName());
        $this->assertTrue(is_string($company->getName()));
    }
    
    public function testSecurityIdentifier(){
        $company = new CompactCompany();
        $this->assertNull($company->getSecurityIdentifier());

        $securityIdentifier = $this->getRandomString(6);

        $company->setSecurityIdentifier($securityIdentifier);

        $this->assertEquals($securityIdentifier,$company->getSecurityIdentifier());
        $this->assertTrue(is_string($company->getSecurityIdentifier()));
    }

    public function testSecAccId(){
        $company = new CompactCompany();
        $this->assertNull($company->getSecuritiesAccountId());

        $secAccId = $this->getRandomString(32);

        $company->setSecuritiesAccountId($secAccId);

        $this->assertEquals($secAccId,$company->getSecuritiesAccountId());
        $this->assertTrue(is_string($company->getSecuritiesAccountId()));
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
