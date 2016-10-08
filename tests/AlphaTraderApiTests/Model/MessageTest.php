<?php
/**
 * User: ljbergmann
 * Date: 08.10.16 23:08
 */

namespace AlphaTraderApiTests\Model;

use Alphatrader\ApiBundle\Model\Message;

/**
 * Class MessageTest
 * @package AlphaTraderApiTests\Model
 */

class MessageTest extends \PHPUnit_Framework_TestCase
{
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

    /**
     * @param int $min
     * @param int $max
     * @return mixed
     */
    private function getRandomFloat($min = 1, $max = 50000000)
    {
        return mt_rand($min, $max) + (rand()/mt_getrandmax());
    }

    /*
    * @param int $length
    * @return string
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
