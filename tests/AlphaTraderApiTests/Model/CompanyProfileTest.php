<?php
/**
 * User: ljbergmann
 * Date: 29.09.16 22:01
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\CompanyProfile;

/**
 * Class CompanyProfileTest
 * @package Tests\Model
 */

class CompanyProfileTest extends \PHPUnit_Framework_TestCase
{
    public function testCurrentSpread(){
        $company = new CompanyProfile();
        $this->assertNull($company->getCurrentSpread());

        $spread = $this->createMock('Alphatrader\ApiBundle\Model\PriceSpread');

        $spread->expects($this->any())->method('getAskPrice')->willReturn($this->getRandomFloat());
        $spread->expects($this->any())->method('getAskSize')->willReturn(mt_rand(1,10000));
        $spread->expects($this->any())->method('getBidPrice')->willReturn($this->getRandomFloat());
        $spread->expects($this->any())->method('getBidSize')->willReturn(mt_rand(1,10000));
        $spread->expects($this->any())->method('getSpreadAbs')->willReturn($this->getRandomFloat(1,200));
        $spread->expects($this->any())->method('getSpreadPercent')->willReturn($this->getRandomFloat(0,1));

        $company->setCurrentSpread($spread);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\PriceSpread',$company->getCurrentSpread());

    }

    public function testDesignatedSponsors(){
        $company = new CompanyProfile();
        $this->assertNull($company->getDesignatedSponsors());

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

        $company->setDesignatedSponsors($ss);
        // Main Tests
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\SecuritySponsorship',$company->getDesignatedSponsors());
        // Testing subClasses
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\CompactCompany',$company->getDesignatedSponsors()->getDesignatedSponsor());
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserName',$company->getDesignatedSponsors()->getDesignatedSponsor()->getCeo());
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserCapabilities',$company->getDesignatedSponsors()->getDesignatedSponsor()->getCeo()->getUserCapabilities());
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Listing',$company->getDesignatedSponsors()->getListing());
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\DesignatedSponsorRating',$company->getDesignatedSponsors()->getSponsorRating());

    }

    public function testLastOrderLogEntry(){
        $company = new CompanyProfile();
        $this->assertNull($company->getLastOrderLogEntry());

        $lole = $this->createMock('Alphatrader\ApiBundle\Model\SecurityOrderLogEntry');

        $lole->expects($this->any())->method('getId')->willReturn($this->getRandomString(12));
        $lole->expects($this->any())->method('getNumberOfShares')->willReturn(mt_rand(1,500));
        $lole->expects($this->any())->method('getPrice')->willReturn($this->getRandomFloat(1,200));
        $lole->expects($this->any())->method('getSecurityIdentifier')->willReturn($this->getRandomString(6));
        $lole->expects($this->any())->method('getSellerSecuritiesAccount')->willReturn(uniqid());
        $lole->expects($this->any())->method('getBuyerSecuritiesAccount')->willReturn(uniqid());
        $lole->expects($this->any())->method('getVolume')->willReturn($this->getRandomFloat(200,50000));

        $company->setLastOrderLogEntry($lole);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\SecurityOrderLogEntry',$company->getLastOrderLogEntry());

    }

    public function testLastPrice(){
        $company = new CompanyProfile();
        $this->assertNull($company->getLastPrice());
        
        $lp = $this->createMock('Alphatrader\ApiBundle\Model\SecurityPrice');
        $lp->expects($this->any())->method('getValue')->willReturn($this->getRandomFloat(200,10000));

        $company->setLastPrice($lp);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\SecurityPrice',$company->getLastPrice());

    }

    public function testMarketCap(){
        $company = new CompanyProfile();
        $this->assertNull($company->getMarketCap());

        $marketCap = $this->getRandomFloat(50000);

        $company->setMarketCap($marketCap);
        $this->assertTrue(is_float($company->getMarketCap()));
        $this->assertEquals($marketCap,$company->getMarketCap());
    }
    
    public function testOutstandingShares(){
        $company = new CompanyProfile();
        $this->assertNull($company->getOutstandingShares());

        $outstandingShares = mt_rand(50000,500000);

        $company->setOutstandingShares($outstandingShares);
        $this->assertTrue(is_int($company->getOutstandingShares()));
        $this->assertEquals($outstandingShares,$company->getOutstandingShares());
    }

    public function testPrices14d(){
        $company = new CompanyProfile();
        $this->assertNull($company->getPrices14d());

        $lole = $this->createMock('Alphatrader\ApiBundle\Model\SecurityOrderLogEntry');

        $lole->expects($this->any())->method('getId')->willReturn($this->getRandomString(12));
        $lole->expects($this->any())->method('getNumberOfShares')->willReturn(mt_rand(1,500));
        $lole->expects($this->any())->method('getPrice')->willReturn($this->getRandomFloat(1,200));
        $lole->expects($this->any())->method('getSecurityIdentifier')->willReturn($this->getRandomString(6));
        $lole->expects($this->any())->method('getSellerSecuritiesAccount')->willReturn(uniqid());
        $lole->expects($this->any())->method('getBuyerSecuritiesAccount')->willReturn(uniqid());
        $lole->expects($this->any())->method('getVolume')->willReturn($this->getRandomFloat(200,50000));

        $company->setPrices14d([$lole,$lole]);

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\SecurityOrderLogEntry',$company->getPrices14d());
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
    * @param int $length
    * @return string
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
