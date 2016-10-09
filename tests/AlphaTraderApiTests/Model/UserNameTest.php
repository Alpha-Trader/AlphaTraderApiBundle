<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 04:16
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\UserName;

/**
 * Class UserNameTest
 * @package Tests\Model
 */

class UserNameTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testId()
    {
        $userAcoount = new UserName();
        $this->assertNull($userAcoount->getId());

        $uid = uniqid();
        $userAcoount->setId($uid);

        $this->assertTrue(is_string($userAcoount->getId()));
        $this->assertEquals($uid, $userAcoount->getId());
    }

    public function testUsername()
    {
        $userAcoount = new UserName();
        $this->assertNull($userAcoount->getUsername());

        $string = $this->getRandomString();
        $userAcoount->setUsername($string);

        $this->assertTrue(is_string($userAcoount->getUsername()));
        $this->assertEquals($string, $userAcoount->getUsername());
    }

    public function testGravatarHash()
    {
        $userAcoount = new UserName();
        $this->assertNull($userAcoount->getGravatarHash());

        $string = $this->getRandomString();
        $userAcoount->setGravatarHash($string);

        $this->assertTrue(is_string($userAcoount->getGravatarHash()));
        $this->assertEquals($string, $userAcoount->getGravatarHash());
    }

    public function testUserCapabilities()
    {
        $userAcoount = new UserName();
        $this->assertNull($userAcoount->getUserCapabilities());

        $uc = $this->createMock("Alphatrader\ApiBundle\Model\UserCapabilities");
        $userAcoount->setUserCapabilities($uc);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\UserCapabilities", $userAcoount->getUserCapabilities());
    }
}
