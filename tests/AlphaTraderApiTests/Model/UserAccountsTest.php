<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 03:41
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\UserAccounts;

/**
 * Class UserAccountsTest
 * @package Tests\Model
 */

class UserAccountsTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testId()
    {
        $userAcoount = new UserAccounts();
        $this->assertNull($userAcoount->getId());

        $uid = uniqid();
        $userAcoount->setId($uid);

        $this->assertTrue(is_string($userAcoount->getId()));
        $this->assertEquals($uid, $userAcoount->getId());
    }

    public function testEmailAddress()
    {
        $userAcoount = new UserAccounts();
        $this->assertNull($userAcoount->getEmailAddress());

        $strig = $this->getRandomString();
        $userAcoount->setEmailAddress($strig);

        $this->assertTrue(is_string($userAcoount->getEmailAddress()));
        $this->assertEquals($strig, $userAcoount->getEmailAddress());
    }

    public function testUserCapabilities()
    {
        $userAcoount = new UserAccounts();
        $this->assertNull($userAcoount->getUserCapabilities());

        $uc = $this->createMock("Alphatrader\ApiBundle\Model\UserCapabilities");
        $userAcoount->setUserCapabilities($uc);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\UserCapabilities", $userAcoount->getUserCapabilities());
    }

    public function testUsername()
    {
        $userAcoount = new UserAccounts();
        $this->assertNull($userAcoount->getUsername());

        $string = $this->getRandomString();
        $userAcoount->setUsername($string);

        $this->assertTrue(is_string($userAcoount->getUsername()));
        $this->assertEquals($string, $userAcoount->getUsername());
    }
}
