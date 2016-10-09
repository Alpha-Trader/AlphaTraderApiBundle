<?php
/**
 * Created by IntelliJ IDEA.
 * User: ljbergmann
 * Date: 26.09.16 02:12
 */

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use Alphatrader\ApiBundle\Model\Bond;

class BondTest extends TestCase
{

    public function testId()
    {
        $bond = new Bond();
        $this->assertNull($bond->getId());

        $uuid = uniqid();

        $bond->setId($uuid);
        $this->assertEquals($uuid, $bond->getId());
        $this->assertTrue(is_string($bond->getId()));
    }

    public function testName()
    {
        $bond = new Bond();
        $this->assertNull($bond->getName());

        $name = $this->getRandomString();

        $bond->setName($name);
        $this->assertEquals($name, $bond->getName());
        $this->assertTrue(is_string($bond->getName()));
    }

    public function test_Volume()
    {
        $bond = new Bond();
        $this->assertNull($bond->getVolume());

        $volume = mt_rand(1, 10000);

        $bond->setVolume($volume);
        $this->assertEquals($volume, $bond->getVolume());
        $this->assertTrue(is_int($bond->getVolume()));
    }

    public function testFaceValue()
    {
        $bond = new Bond();
        $this->assertNull($bond->getFaceValue());

        $faceValue = mt_rand(0, 99)+(mt_rand() / mt_getrandmax());
        $bond->setFaceValue($faceValue);
        $this->assertEquals($faceValue, $bond->getFaceValue());
        $this->assertTrue(is_float($bond->getFaceValue()));
    }

    public function testInterrestRate()
    {
        $bond = new Bond();
        $this->assertNull($bond->getInterestRate());

        $interrestRate = mt_rand() / mt_getrandmax();

        $bond->setInterestRate($interrestRate);
        $this->assertEquals($interrestRate, $bond->getInterestRate());
        $this->assertTrue(is_float($bond->getInterestRate()));
    }

    public function testIssueDate()
    {
        $bond = new Bond();
        $this->assertNull($bond->getIssueDate());

        $time = mt_rand(1262055681, 1474823143);
        $bond->setIssueDate($time);
        $this->assertEquals($time, $bond->getIssueDate());
        $this->assertTrue(is_int($bond->getIssueDate()));
    }

    public function testIssuer()
    {
        $bond = new Bond();
        $this->assertNull($bond->getIssuer());
        
        // Given
        $companyName = $this->createMock('Alphatrader\ApiBundle\Model\CompanyName');
        $listing = $this->createMock('Alphatrader\ApiBundle\Model\Listing');
        
        $companyName->expects($this->any())->method('getId')->will($this->returnValue($this->getRandomString()));
        $companyName->expects($this->any())->method('getName')->will($this->returnValue($this->getRandomString()));
        $companyName->expects($this->any())->method('getSecurityIdentifier')->will($this->returnValue($this->getRandomString()));
        $companyName->expects($this->any())->method('getListing')->will($this->returnValue($listing));
        
        //When
        $bond->setIssuer($companyName);
        
        //Then
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\CompanyName', $bond->getIssuer());
    }

    public function testListing()
    {
        $bond = new Bond();
        $this->assertNull($bond->getListing());

        // Given
        $listing = $this->createMock('Alphatrader\ApiBundle\Model\Listing');

        //When
        $bond->setListing($listing);

        //Then
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Listing', $bond->getListing());
    }

    public function testReListing()
    {
        $bond = new Bond();
        $this->assertNull($bond->getRepurchaseListing());

        // Given
        $listing = $this->createMock('Alphatrader\ApiBundle\Model\Listing');

        //When
        $bond->setRepurchaseListing($listing);

        //Then
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Listing', $bond->getRepurchaseListing());
    }
    
    public function testMaturityDate()
    {
        $bond = new Bond();
        $this->assertNull($bond->getMaturityDate());

        $time = mt_rand(1262055681, 1474823143);
        $bond->setMaturityDate($time);
        $this->assertEquals($time, $bond->getMaturityDate());
        $this->assertTrue(is_int($bond->getMaturityDate()));
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
