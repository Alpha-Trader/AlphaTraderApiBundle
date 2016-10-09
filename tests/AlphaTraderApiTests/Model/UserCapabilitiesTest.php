<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 05:49
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\UserCapabilities;

/**
 * Class UserCapabilitiesTest
 * @package Tests\Model
 */

class UserCapabilitiesTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testLevel2User()
    {
        $userCapabilities = new UserCapabilities();
        $this->assertNull($userCapabilities->isLevel2User());
        
        $bool =  mt_rand(0, 1);
        $userCapabilities->setLevel2User($bool);
        
        $this->assertEquals($bool, $userCapabilities->isLevel2User());
    }

    public function testLevel2UserEndDate()
    {
        $userCapabilities = new UserCapabilities();
        $this->assertNull($userCapabilities->getLevel2UserEndDate());

        $date = new \DateTime('now');
        $date = $date->getTimestamp();
        $userCapabilities->setLevel2UserEndDate($date);


        $this->assertTrue(is_int($userCapabilities->getLevel2UserEndDate()));
        $this->assertEquals($date, $userCapabilities->getLevel2UserEndDate());
    }

    public function testLocale()
    {
        $userCapabilities = new UserCapabilities();
        $this->assertNull($userCapabilities->getLocale());

        $locale = $this->getRandomString();
        $userCapabilities->setLocale($locale);

        $this->assertTrue(is_string($userCapabilities->getLocale()));
        $this->assertEquals($locale, $userCapabilities->getLocale());
    }

    public function testPartner()
    {
        $userCapabilities = new UserCapabilities();
        $this->assertNull($userCapabilities->isPartner());

        $bool =  mt_rand(0, 1);
        $userCapabilities->setPartner($bool);

        $this->assertEquals($bool, $userCapabilities->isPartner());
    }

    public function testPartnerId()
    {
        $userCapabilities = new UserCapabilities();
        $this->assertNull($userCapabilities->getPartnerId());

        $id = $this->getRandomString();
        $userCapabilities->setPartnerId($id);

        $this->assertTrue(is_string($userCapabilities->getPartnerId()));
        $this->assertEquals($id, $userCapabilities->getPartnerId());
    }

    public function testPremium()
    {
        $userCapabilities = new UserCapabilities();
        $this->assertNull($userCapabilities->hasPremium());

        $bool =  mt_rand(0, 1);
        $userCapabilities->setPremium($bool);

        $this->assertEquals($bool, $userCapabilities->hasPremium());
    }

    public function testPremiumEndDate()
    {
        $userCapabilities = new UserCapabilities();
        $this->assertNull($userCapabilities->getPremiumEndDate());

        $date = new \DateTime('now');
        $date = $date->getTimestamp();
        $userCapabilities->setPremiumEndDate($date);


        $this->assertTrue(is_int($userCapabilities->getPremiumEndDate()));
        $this->assertEquals($date, $userCapabilities->getPremiumEndDate());
    }
}
