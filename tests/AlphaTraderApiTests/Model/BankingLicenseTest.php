<?php
/**
 * Created by IntelliJ IDEA.
 * User: ljbergmann
 * Date: 26.09.16 01:47
 */

namespace Tests\Model;

use \Alphatrader\ApiBundle\Model\BankingLicense;
use PHPUnit\Framework\TestCase;

class BankingLicenseTest extends TestCase
{
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
        
        $date = new \DateTime();

        $compactcompany = $this->createMock('Alphatrader\ApiBundle\Model\CompactCompany');
        $username = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        $usercaps = $this->createMock('Alphatrader\ApiBundle\Model\UserCapabilities');

        $usercaps->expects($this->any())->method('isLevel2User')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getLevel2UserEndDate')->will($this->returnValue($date));
        $usercaps->expects($this->any())->method('getLocale')->will($this->returnValue('en_US'));
        $usercaps->expects($this->any())->method('isPartner')->will($this->returnValue(false));
        $usercaps->expects($this->any())->method('getPartnerId')->will($this->returnValue($this->getRandomString()));
        $usercaps->expects($this->any())->method('hasPremium')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getPremiumEndDate')->will($this->returnValue($date));

        $username->expects($this->any())->method('getId')->will($this->returnValue($this->getRandomString()));
        $username->expects($this->any())->method('getUsername')->will($this->returnValue($this->getRandomString()));
        $username->expects($this->any())->method('getGravatarHash')->will($this->returnValue($this->getRandomString(25)));
        $username->expects($this->any())->method('getUserCapabilities')->will($this->returnValue($usercaps));

        $compactcompany->expects($this->any())->method('getId')->will($this->returnValue($this->getRandomString()));
        $compactcompany->expects($this->any())->method('getName')->will($this->returnValue($this->getRandomString()));
        $compactcompany->expects($this->any())->method('getSecurityIdentifier')->will($this->returnValue($this->getRandomString()));
        $compactcompany->expects($this->any())->method('getCeo')->will($this->returnValue($username));
        
        $bankLicense->setCompany($compactcompany);

        $this->assertTrue($bankLicense->getCompany()->getCeo()->getUserCapabilities()->isLevel2User());
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\CompactCompany', $bankLicense->getCompany());
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