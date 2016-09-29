<?php
/**
 * User: ljbergmann
 * Date: 29.09.16 19:16
 */

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use Alphatrader\ApiBundle\Model\Ceo;

/**
 * Class AbstracPollTest
 * @package Tests\Model
 * @author ljbergmann
 */
class CeoTest extends TestCase
{

    public function testId(){
        $ceo = new Ceo();
        $this->assertNull($ceo->getId());

        $uuid = uniqid();

        $ceo->setId($uuid);
        $this->assertEquals($uuid,$ceo->getId());
        $this->assertTrue(is_string($ceo->getId()));
    }

    public function testUserCapabilities(){
        $ceo = new Ceo();
        $this->assertNull($ceo->getUserCapabilities());

        $date = new \DateTime();

        $usercaps = $this->createMock('Alphatrader\ApiBundle\Model\UserCapabilities');

        $usercaps->expects($this->any())->method('isLevel2User')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getLevel2UserEndDate')->will($this->returnValue($date));
        $usercaps->expects($this->any())->method('getLocale')->will($this->returnValue('en_US'));
        $usercaps->expects($this->any())->method('isPartner')->will($this->returnValue(false));
        $usercaps->expects($this->any())->method('getPartnerId')->will($this->returnValue($this->getRandomString()));
        $usercaps->expects($this->any())->method('hasPremium')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getPremiumEndDate')->will($this->returnValue($date));

        $ceo->setUserCapabilities($usercaps);
        
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserCapabilities',$ceo->getUserCapabilities());
    }
    
    public function testUsername(){
        $ceo = new Ceo();
        $this->assertNull($ceo->getUsername());
        
        $username = $this->getRandomString(12);
        $ceo->setUsername($username);
        $this->assertEquals($username,$ceo->getUsername());
        $this->assertTrue(is_string($ceo->getUsername()));
    }

    public function testGravatarHash(){
        $ceo = new Ceo();
        $this->assertNull($ceo->getGravatarHash());
        
        $gravatarHash = $this->getRandomString(32);
        $ceo->setGravatarHash($gravatarHash);
        $this->assertEquals($gravatarHash,$ceo->getGravatarHash());
        $this->assertTrue(is_string($ceo->getGravatarHash()));
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