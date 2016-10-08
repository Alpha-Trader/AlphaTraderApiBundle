<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 00:31
 */

namespace AlphaTraderApiTests\Model;

use Alphatrader\ApiBundle\Model\Notifications;

/**
 * Class NotificationsTest
 * @package AlphaTraderApiTests\Model
 */

class NotificationsTest extends \PHPUnit_Framework_TestCase
{
    public function testId()
    {
        $notification = new Notifications();
        $this->assertNull($notification->getId());

        $uuid = uniqid();
        $notification->setId($uuid);

        $this->assertTrue(is_string($notification->getId()));
        $this->assertEquals($uuid, $notification->getId());
    }

    public function testContent()
    {
        $notification = new Notifications();
        $this->assertNull($notification->getContent());

        $messagePrototype = $this->createMock("Alphatrader\ApiBundle\Model\MessagePrototype");
        $notification->setContent($messagePrototype);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\MessagePrototype", $notification->getContent());
    }

    public function testReadByReceiver()
    {
        $notification = new Notifications();
        $this->assertNull($notification->getReadByReceiver());

        $username = $this->createMock("Alphatrader\ApiBundle\Model\UserName");
        $notification->setReadByReceiver($username);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\UserName", $notification->getReadByReceiver());
    }
    
    public function testReceiver()
    {
        $notification = new Notifications();
        $this->assertNull($notification->getReceiver());

        $username = $this->createMock("Alphatrader\ApiBundle\Model\UserName");
        $notification->setReceiver($username);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\UserName", $notification->getReceiver());
    }

    public function testSubject()
    {
        $notification = new Notifications();
        $this->assertNull($notification->getSubject());

        $subject = $this->createMock("Alphatrader\ApiBundle\Model\MessagePrototype");
        $notification->setSubject($subject);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\MessagePrototype", $notification->getSubject());
    }
}
