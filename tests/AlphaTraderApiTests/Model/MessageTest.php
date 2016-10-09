<?php
/**
 * User: ljbergmann
 * Date: 08.10.16 23:08
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\Message;

/**
 * Class MessageTest
 * @package AlphaTraderApiTests\Model
 */

class MessageTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testGetChatId()
    {
        $message = new Message();
        $this->assertNull($message->getChatId());

        $uuid = uniqid();
        $message->setChatId($uuid);

        $this->assertTrue(is_string($message->getChatId()));
        $this->assertEquals($uuid, $message->getChatId());
    }

    public function testContent()
    {
        $message = new Message();
        $this->assertNull($message->getContent());

        $content = $this->getRandomString(600);
        $message->setContent($content);

        $this->assertTrue(is_string($message->getContent()));
        $this->assertEquals($content, $message->getContent());
    }

    public function testDateSent()
    {
        $message = new Message();
        $this->assertNull($message->getDateSent());

        $dateSent = new \DateTime('now');
        $dateSent = $dateSent->getTimestamp();
        $message->setDateSent($dateSent);

        $this->assertTrue(is_int($message->getDateSent()));
        $this->assertEquals($dateSent, $message->getDateSent());
    }

    public function testId()
    {
        $message = new Message();
        $this->assertNull($message->getId());

        $uuid = uniqid();
        $message->setId($uuid);

        $this->assertTrue(is_string($message->getId()));
        $this->assertEquals($uuid, $message->getId());
    }

    public function testRead()
    {
        $message = new Message();
        $this->assertNull($message->isRead());

        $message->setRead(true);
        $this->assertTrue($message->isRead());
        $message->setRead(false);
        $this->assertFalse($message->isRead());
    }

    public function testSender()
    {
        $message = new Message();
        $this->assertNull($message->getSender());

        $sender = $this->createMock('\Alphatrader\ApiBundle\Model\UserName');
        $message->setSender($sender);

        $this->assertInstanceOf('\Alphatrader\ApiBundle\Model\UserName', $message->getSender());
    }
}
