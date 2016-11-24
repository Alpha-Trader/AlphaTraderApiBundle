<?php
/**
 * User: ljbergmann
 * Date: 29.09.16 19:45
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\Chat;
use Alphatrader\ApiBundle\Model\LastMessage;
use PHPUnit\Framework\TestCase;

/**
 * Class ChatsTest
 * @package Tests\Model
 * @author ljbergmann
 */
class ChatTest extends TestCase
{
    use RandomTrait;
    
    public function testId()
    {
        $chat = new Chat();
        $this->assertNull($chat->getId());

        $uuid = uniqid();

        $chat->setId($uuid);
        $this->assertEquals($uuid, $chat->getId());
        $this->assertTrue(is_string($chat->getId()));
    }
    
    public function testLastMessage()
    {
        $chat = new Chat();
        $this->assertNull($chat->getLastMessage());
        
        $date = new \DateTime();
        
        $lastMessage = $this->createMock('Alphatrader\ApiBundle\Model\LastMessage');
        $participants = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        $sender = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        $usercaps = $this->createMock('Alphatrader\ApiBundle\Model\UserCapabilities');
        
        $usercaps->expects($this->any())->method('isLevel2User')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getLevel2UserEndDate')->will($this->returnValue($date));
        $usercaps->expects($this->any())->method('getLocale')->will($this->returnValue('en_US'));
        $usercaps->expects($this->any())->method('isPartner')->will($this->returnValue(false));
        $usercaps->expects($this->any())->method('getPartnerId')->will($this->returnValue($this->getRandomString()));
        $usercaps->expects($this->any())->method('hasPremium')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getPremiumEndDate')->will($this->returnValue($date));
        
        $participants->expects($this->any())->method('getId')->will($this->returnValue($this->getRandomString()));
        $participants->expects($this->any())->method('getUsername')->will($this->returnValue($this->getRandomString()));
        $participants->expects($this->any())->method('getGravatarHash')->will($this->returnValue($this->getRandomString(25)));
        $participants->expects($this->any())->method('getUserCapabilities')->will($this->returnValue($usercaps));

        $sender->expects($this->any())->method('getId')->will($this->returnValue($this->getRandomString()));
        $sender->expects($this->any())->method('getUsername')->will($this->returnValue($this->getRandomString()));
        $sender->expects($this->any())->method('getGravatarHash')->will($this->returnValue($this->getRandomString(25)));
        $sender->expects($this->any())->method('getUserCapabilities')->will($this->returnValue($usercaps));
        
        $lastMessage->expects($this->any())->method('getId')->will($this->returnValue(uniqid()));
        $lastMessage->expects($this->any())->method('getChatId')->will($this->returnValue(uniqid()));
        $lastMessage->expects($this->any())->method('getContent')->will($this->returnValue($this->getRandomString(200)));
        $lastMessage->expects($this->any())->method('getDateSent')->will($this->returnValue(new \DateTime()));
        $lastMessage->expects($this->any())->method('getParticipants')->will($this->returnValue([$participants]));
        $lastMessage->expects($this->any())->method('isRead')->will($this->returnValue(true));
        $lastMessage->expects($this->any())->method('getSender')->will($this->returnValue($sender));
        
        $chat->setLastMessage($lastMessage);
        
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\LastMessage', $chat->getLastMessage());
    }
    
    public function testDateCreated()
    {
        $chat = new Chat();
        $this->assertNull($chat->getDateCreated());
        
        $date = $this->getRandomString(12);
        $chat->setDateCreated($date);
        
        $this->assertEquals($date, $chat->getDateCreated());
        $this->assertTrue(is_string($chat->getDateCreated()));
    }
    
    public function testChatName()
    {
        $chat = new Chat();
        $this->assertNull($chat->getChatName());
        
        $name = $this->getRandomString(12);
        $chat->setChatName($name);
        
        $this->assertEquals($name, $chat->getChatName());
        $this->assertTrue(is_string($chat->getChatName()));
    }
    
    public function testParticipants()
    {
        $chat = new Chat();
        $this->assertNull($chat->getParticipants());

        $date = new \DateTime();
        $participants = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        $usercaps = $this->createMock('Alphatrader\ApiBundle\Model\UserCapabilities');

        $usercaps->expects($this->any())->method('isLevel2User')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getLevel2UserEndDate')->will($this->returnValue($date));
        $usercaps->expects($this->any())->method('getLocale')->will($this->returnValue('en_US'));
        $usercaps->expects($this->any())->method('isPartner')->will($this->returnValue(false));
        $usercaps->expects($this->any())->method('getPartnerId')->will($this->returnValue($this->getRandomString()));
        $usercaps->expects($this->any())->method('hasPremium')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getPremiumEndDate')->will($this->returnValue($date));

        $participants->expects($this->any())->method('getId')->will($this->returnValue($this->getRandomString()));
        $participants->expects($this->any())->method('getUsername')->will($this->returnValue($this->getRandomString()));
        $participants->expects($this->any())->method('getGravatarHash')->will($this->returnValue($this->getRandomString(25)));
        $participants->expects($this->any())->method('getUserCapabilities')->will($this->returnValue($usercaps));

        $chat->setParticipants($participants);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserName', $chat->getParticipants());
    }

    public function testIsReadOnly()
    {
        $chat = new Chat();
        $this->assertNull($chat->isReadonly());

        $readOnly = (bool)mt_rand(0, 1);
        $chat->setReadonly($readOnly);
        $this->assertEquals($readOnly, $chat->isReadonly());
        $this->assertTrue(is_bool($chat->isReadonly()));
    }

    public function testOwner()
    {
        $chat = new Chat();
        $this->assertNull($chat->getOwner());

        $date = new \DateTime();
        $owner = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        $usercaps = $this->createMock('Alphatrader\ApiBundle\Model\UserCapabilities');

        $usercaps->expects($this->any())->method('isLevel2User')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getLevel2UserEndDate')->will($this->returnValue($date));
        $usercaps->expects($this->any())->method('getLocale')->will($this->returnValue('en_US'));
        $usercaps->expects($this->any())->method('isPartner')->will($this->returnValue(false));
        $usercaps->expects($this->any())->method('getPartnerId')->will($this->returnValue($this->getRandomString()));
        $usercaps->expects($this->any())->method('hasPremium')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getPremiumEndDate')->will($this->returnValue($date));

        $owner->expects($this->any())->method('getId')->will($this->returnValue($this->getRandomString()));
        $owner->expects($this->any())->method('getUsername')->will($this->returnValue($this->getRandomString()));
        $owner->expects($this->any())->method('getGravatarHash')->will($this->returnValue($this->getRandomString(25)));
        $owner->expects($this->any())->method('getUserCapabilities')->will($this->returnValue($usercaps));

        $chat->setOwner($owner);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserName', $chat->getOwner());
    }

    public function testAfterDeserialization()
    {
        $time = 1474099171103;
        $date = substr($time, 0, 10) . '.' . substr($time, 10);
        $micro = sprintf("%06d", ($date - floor($date)) * 1000000);
        $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $date));

        $chat = new Chat();
        $chat->setDateCreated($time);
        $chat->setChatName("Test");
        
        $this->invokeMethod($chat, 'afterDeserialization');
        $this->assertEquals($date, $chat->getDateCreated());
    }

    public function testPreSerialization()
    {
        $chat = new Chat();

        $date = new \DateTime('now');
        $chat->setDateCreated($date);

        $lastMessage = new LastMessage();
        $lastMessage->setDateSent($date);
        $chat->setLastMessage($lastMessage);

        $expected = $date->getTimestamp();
        $this->invokeMethod($chat, 'preSerialization');

        $this->assertEquals($expected, $chat->getDateCreated());
        $this->assertEquals($expected, $chat->getLastMessage()->getDateSent());
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
