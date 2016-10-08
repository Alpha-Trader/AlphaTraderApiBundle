<?php
/**
 * User: ljbergmann
 * Date: 29.09.16 21:02
 */

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use Alphatrader\ApiBundle\Model\Company;

/**
 * Class CompanyTest
 * @package Tests\Model
 * @author ljbergmann
 */
class CompanyTest extends TestCase
{

    public function testId()
    {
        $company = new Company();
        $this->assertNull($company->getId());

        $uuid = uniqid();

        $company->setId($uuid);
        $this->assertEquals($uuid, $company->getId());
        $this->assertTrue(is_string($company->getId()));
    }

    public function testBankAccount()
    {
        $company = new Company();
        $this->assertNull($company->getBankAccount());

        $bankAccount = $this->createMock('Alphatrader\ApiBundle\Model\BankAccount');
        $bankAccount->expects($this->any())->method('getId')->will($this->returnValue($this->getRandomString(12)));
        $bankAccount->expects($this->any())->method('getCash')->will($this->returnValue(mt_rand(1, 50000)+(mt_rand() / mt_getrandmax())));

        $company->setBankAccount($bankAccount);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\BankAccount', $company->getBankAccount());
    }

    public function testCeo()
    {
        $company = new Company();
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
        
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserName', $company->getCeo());
    }
    
    public function testListing()
    {
        $company = new Company();
        $this->assertNull($company->getListing());
        
        $listing = $this->createMock('Alphatrader\ApiBundle\Model\Listing');
        $listing->expects($this->any())->method('getSecurityIdentifier')->willReturn($this->getRandomString(12));
        $listing->expects($this->any())->method('getType')->willReturn('Bond');

        $company->setListing($listing);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Listing', $company->getListing());
    }

    public function testName()
    {
        $company = new Company();
        $this->assertNull($company->getName());

        $name = $this->getRandomString(12);

        $company->setName($name);
        $this->assertEquals($name, $company->getName());
        $this->assertTrue(is_string($company->getName()));
    }

    public function testSecuritiesAccountId()
    {
        $company = new Company();
        $this->assertNull($company->getSecuritiesAccountId());

        $uuid = uniqid();

        $company->setSecuritiesAccountId($uuid);
        $this->assertEquals($uuid, $company->getSecuritiesAccountId());
        $this->assertTrue(is_string($company->getSecuritiesAccountId()));
    }
    /*
    * @param $length
    */
    private function getRandomString($length = 6)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
}
