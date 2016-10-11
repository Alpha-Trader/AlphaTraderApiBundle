<?php

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\Chat;
use Alphatrader\ApiBundle\Model\CompactChat;
use PHPUnit\Framework\TestCase;

/**
 * Class CompactChatTest
 * @package Tests\Model
 * @author Tr0nYx
 */
class CompactChatTest extends TestCase
{

    public function testId()
    {
        $chat = new CompactChat();
        $this->assertNull($chat->getId());

        $uuid = uniqid();

        $chat->setId($uuid);
        $this->assertEquals($uuid, $chat->getId());
        $this->assertTrue(is_string($chat->getId()));
    }
    
    public function testLastMessage()
    {
        $chat = new CompactChat();
        $this->assertNull($chat->getLastMessage());

        $message = $this->createMock('Alphatrader\ApiBundle\Model\Message');
        
        $chat->setLastMessage($message);
        
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Message', $chat->getLastMessage());
    }
    
    public function testDateCreated()
    {
        $chat = new CompactChat();
        $this->assertNull($chat->getDateCreated());
        
        $date = $this->getRandomString(12);
        $chat->setDateCreated($date);
        
        $this->assertEquals($date, $chat->getDateCreated());
        $this->assertTrue(is_string($chat->getDateCreated()));
    }
    
    public function testChatName()
    {
        $chat = new CompactChat();
        $this->assertNull($chat->getChatName());
        
        $name = $this->getRandomString(12);
        $chat->setChatName($name);
        
        $this->assertEquals($name, $chat->getChatName());
        $this->assertTrue(is_string($chat->getChatName()));
    }

    public function testIsReadOnly()
    {
        $chat = new CompactChat();
        $this->assertNull($chat->isReadonly());

        $readOnly = (bool)mt_rand(0, 1);
        $chat->setReadonly($readOnly);
        $this->assertEquals($readOnly, $chat->isReadonly());
        $this->assertTrue(is_bool($chat->isReadonly()));
    }

    public function testOwner()
    {
        $chat = new CompactChat();
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
