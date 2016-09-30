<?php
/**
 * User: ljbergmann
 * Date: 30.09.16 02:54
 */

namespace AlphaTraderApiTests\Model;

/**
 * Class CompanyTraitTest
 * @package AlphaTraderApiTests\Model
 */

class CompanyTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Alphatrader\ApiBundle\Model\CompanyTrait
     */
    private $traitObject;

    public function setUp()
    {
        $this->traitObject = $this->createObjectForTrait();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\CompanyTrait
     */
    private function createObjectForTrait()
    {
        $traitName = 'Alphatrader\ApiBundle\Model\CompanyTrait';

        return $this->getObjectForTrait($traitName);
    }
    
    public function testId(){
        $this->assertNull($this->traitObject->getId());
        $uuid = uniqid();

        $this->traitObject->setId($uuid);
        $this->assertTrue(is_string($this->traitObject->getId()));
        $this->assertEquals($uuid,$this->traitObject->getId());
    }

    public function testBankAccount(){
        $this->assertNull($this->traitObject->getBankAccount());

        $bankAccount = $this->createMock('Alphatrader\ApiBundle\Model\BankAccount');
        $bankAccount->expects($this->any())->method('getId')->will($this->returnValue($this->getRandomString(12)));
        $bankAccount->expects($this->any())->method('getCash')->will($this->returnValue(mt_rand(1,50000)+(mt_rand() / mt_getrandmax())));

        $this->traitObject->setBankAccount($bankAccount);
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\BankAccount',$this->traitObject->getBankAccount());
    }
    
    public function testSecuritiesAccountId(){
        $this->assertNull($this->traitObject->getSecuritiesAccountId());

        $string = $this->getRandomString(32);
        $this->traitObject->setSecuritiesAccountId($string);

        $this->assertTrue(is_string($this->traitObject->getSecuritiesAccountId()));
        $this->assertEquals($string,$this->traitObject->getSecuritiesAccountId());
    }

    public function testSponsoredListing(){

        $this->assertNull($this->traitObject->getSponsoredListings());

        $date = new \DateTime();

        $ss     = $this->createMock('Alphatrader\ApiBundle\Model\SecuritySponsorship');
        $cc     = $this->createMock('Alphatrader\ApiBundle\Model\CompactCompany');
        $ls     = $this->createMock('Alphatrader\ApiBundle\Model\Listing');
        $dsr    = $this->createMock('Alphatrader\ApiBundle\Model\DesignatedSponsorRating');
        $un     = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        $uc     = $this->createMock('Alphatrader\ApiBundle\Model\UserCapabilities');
        // UserCapabilities
        $uc->expects($this->any())->method('isLevel2User')->will($this->returnValue(true));
        $uc->expects($this->any())->method('getLevel2UserEndDate')->will($this->returnValue($date));
        $uc->expects($this->any())->method('getLocale')->will($this->returnValue('en_US'));
        $uc->expects($this->any())->method('isPartner')->will($this->returnValue(false));
        $uc->expects($this->any())->method('getPartnerId')->will($this->returnValue($this->getRandomString()));
        $uc->expects($this->any())->method('hasPremium')->will($this->returnValue(true));
        $uc->expects($this->any())->method('getPremiumEndDate')->will($this->returnValue($date));
        // Username
        $un->expects($this->any())->method('getId')->will($this->returnValue($this->getRandomString()));
        $un->expects($this->any())->method('getUsername')->will($this->returnValue($this->getRandomString()));
        $un->expects($this->any())->method('getGravatarHash')->will($this->returnValue($this->getRandomString(25)));
        $un->expects($this->any())->method('getUserCapabilities')->will($this->returnValue($uc));
        // Listing
        $ls->expects($this->any())->method('getSecurityIdentifier')->willReturn($this->getRandomString(12));
        $ls->expects($this->any())->method('getType')->willReturn('Bond');
        //C ompactCompany
        $cc->expects($this->any())->method('getId')->willReturn($this->getRandomString(12));
        $cc->expects($this->any())->method('getCeo')->willReturn($un);
        $cc->expects($this->any())->method('getSecurityIdentifier')->willReturn($this->getRandomString(6));
        $cc->expects($this->any())->method('getSecuritiesAccountId')->willReturn($this->getRandomString(32));
        // DesignatedSponsorRating
        $dsr->expects($this->any())->method('getSalary')->willReturn($this->getRandomFloat(1,500));
        $dsr->expects($this->any())->method('getValue')->willReturn($this->getRandomString(1));
        // SecuritySponsorship
        $ss->expects($this->any())->method('getDesignatedSponsor')->willReturn($cc);
        $ss->expects($this->any())->method('getListing')->willReturn($ls);
        $ss->expects($this->any())->method('getSponsorRating')->willReturn($dsr);

        $this->traitObject->setSponsoredListings($ss);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\SecuritySponsorship',$this->traitObject->getSponsoredListings());
        // Testing subClasses
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\CompactCompany',$this->traitObject->getSponsoredListings()->getDesignatedSponsor());
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserName',$this->traitObject->getSponsoredListings()->getDesignatedSponsor()->getCeo());
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserCapabilities',$this->traitObject->getSponsoredListings()->getDesignatedSponsor()->getCeo()->getUserCapabilities());
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Listing',$this->traitObject->getSponsoredListings()->getListing());
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\DesignatedSponsorRating',$this->traitObject->getSponsoredListings()->getSponsorRating());
    }

    public function testLogoUrl(){
        $this->assertNull($this->traitObject->getLogoUrl());
        $url = $this->getRandomString(255);
        $this->traitObject->setLogoUrl($url);

        $this->assertTrue(is_string($this->traitObject->getLogoUrl()));
        $this->assertEquals($url,$this->traitObject->getLogoUrl());
    }

    public function testHasLogo(){
        $this->assertFalse($this->traitObject->hasLogo());
        $this->traitObject->setLogoUrl($this->getRandomString(255));
        $this->assertTrue($this->traitObject->hasLogo());
    }

    public function testCeo(){

        $this->assertNull($this->traitObject->getCeo());

        $date = new \DateTime();
        $ceo = $this->createMock('Alphatrader\ApiBundle\Model\Ceo');
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

        $this->traitObject->setCeo($ceo);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Ceo',$this->traitObject->getCeo());
    }

    public function testName(){
        $this->assertNull($this->traitObject->getName());

        $name = $this->getRandomString(12);

        $this->traitObject->setName($name);
        $this->assertTrue(is_string($this->traitObject->getName()));
        $this->assertEquals($name,$this->traitObject->getName());
    }

    public function testIssuedBonds(){
        $this->assertNull($this->traitObject->getIssuedBonds());
        
        $company = $this->createMock('Alphatrader\ApiBundle\Model\CompanyName');
        $listing = $this->createMock('Alphatrader\ApiBundle\Model\Listing');
        $listing->expects($this->any())->method('getSecurityIdentifier')->willReturn($this->getRandomString(12));
        $listing->expects($this->any())->method('getType')->willReturn($this->getRandomString(6));

        $company->expects($this->any())->method('getId')->willReturn($this->getRandomString(12));
        $company->expects($this->any())->method('getListing')->willReturn($listing);
        $company->expects($this->any())->method('getName')->willReturn($this->getRandomString(12));
        $company->expects($this->any())->method('getSecurityIdentifier')->willReturn($this->getRandomString(30));


        $bond = $this->createMock('Alphatrader\ApiBundle\Model\Bond');

        $bond->expects($this->any())->method('getId')->willReturn($this->getRandomString(12));
        $bond->expects($this->any())->method('getFaceValue')->willReturn($this->getRandomFloat(100,1000));
        $bond->expects($this->any())->method('getInterestRate')->willReturn($this->getRandomFloat(0,1));
        $bond->expects($this->any())->method('getIssueDate')->willReturn(new \DateTime());
        $bond->expects($this->any())->method('getIssuer')->willReturn($company);
        $bond->expects($this->any())->method('getMaturityDate')->willReturn(new \DateTime());
        $bond->expects($this->any())->method('getName')->willReturn($this->getRandomString(12));
        $bond->expects($this->any())->method('getRepurchaseListing')->willReturn($listing);
        $bond->expects($this->any())->method('getListing')->willReturn($listing);
        $bond->expects($this->any())->method('getVolume')->willReturn($this->getRandomFloat(50000));

        $this->traitObject->setIssuedBonds([$bond,$bond]);
        // Main
        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Bond',$this->traitObject->getIssuedBonds());
        // Sub
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Bond',$this->traitObject->getIssuedBonds()[0]);
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Listing',$this->traitObject->getIssuedBonds()[0]->getListing());
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Listing',$this->traitObject->getIssuedBonds()[0]->getRepurchaseListing());
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\CompanyName',$this->traitObject->getIssuedBonds()[0]->getIssuer());
    }

    public function testListing(){
        $this->assertNull($this->traitObject->getListing());
        $listing = $this->createMock('Alphatrader\ApiBundle\Model\Listing');
        $listing->expects($this->any())->method('getSecurityIdentifier')->willReturn($this->getRandomString(12));
        $listing->expects($this->any())->method('getType')->willReturn($this->getRandomString(6));

        $this->traitObject->setListing($listing);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Listing',$this->traitObject->getListing());
    }

    public function testLastTrades(){
        $this->assertNull($this->traitObject->getLastTrades());

        $sole = $this->createMock('Alphatrader\ApiBundle\Model\SecurityOrderLogEntry');
        $sole->expects($this->any())->method('getId')->willReturn($this->getRandomString(12));
        $sole->expects($this->any())->method('getNumberOfShares')->willReturn(mt_rand(50,50000));
        $sole->expects($this->any())->method('getPrice')->willReturn($this->getRandomFloat(10,50));
        $sole->expects($this->any())->method('getSecurityIdentifier')->willReturn($this->getRandomString(12));
        $sole->expects($this->any())->method('getSellerSecuritiesAccount')->willReturn($this->getRandomString(12));
        $sole->expects($this->any())->method('getVolume')->willReturn($this->getRandomFloat(10000));

        $this->traitObject->setLastTrades([$sole,$sole]);

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\SecurityOrderLogEntry',$this->traitObject->getLastTrades());
    }
    
    public function testCeoEmployAgree(){
        $this->assertNull($this->traitObject->getCeoEmployAgree());
        
        $employAgree = $this->createMock('Alphatrader\ApiBundle\Model\EmploymentAgreement');
        $employAgree->expects($this->any())->method('getId')->willReturn($this->getRandomString(12));
        $employAgree->expects($this->any())->method('getDailyWage')->willReturn($this->getRandomFloat(50,5000));

        $this->traitObject->setCeoEmployAgree($employAgree);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\EmploymentAgreement',$this->traitObject->getCeoEmployAgree());

    }

    public function testCompanyCapabilities(){
        $this->assertNull($this->traitObject->getCompanyCapabilities());

        $cc = $this->createMock('Alphatrader\ApiBundle\Model\CompanyCapabilities');
        $cc->expects($this->any())->method('isBank')->willReturn(true);
        $cc->expects($this->any())->method('isBankReady')->willReturn(true);
        $cc->expects($this->any())->method('isDesignatedSponsor')->willReturn(false);
        $cc->expects($this->any())->method('getMaxCentralBankLoans')->willReturn($this->getRandomFloat());
        $cc->expects($this->any())->method('getReserves')->willReturn($this->getRandomFloat());
        $cc->expects($this->any())->method('getTakenCentralBankLoans')->willReturn($this->getRandomFloat());
        $cc->expects($this->any())->method('getNetCash')->willReturn($this->getRandomFloat());

        $this->traitObject->setCompanyCapabilities($cc);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\CompanyCapabilities',$this->traitObject->getCompanyCapabilities());
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
