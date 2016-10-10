<?php
/**
 * User: ljbergmann
 * Date: 05.10.16 01:24
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\LastMessage;

/**
 * Class LastMessageTest
 * @package AlphaTraderApiTests\Model
 */

class LastMessageTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testId()
    {
        $lastMessage = new LastMessage();
        $this->assertNull($lastMessage->getId());

        $uid = uniqid();

        $lastMessage->setId($uid);

        $this->assertEquals($uid, $lastMessage->getId());
    }

    public function testContent()
    {
        $lastMessage = new LastMessage();
        $this->assertNull($lastMessage->getContent());

        $content = $this->getRandomString(12);
        $lastMessage->setContent($content);

        $this->assertTrue(is_string($lastMessage->getContent()));
        $this->assertEquals($content, $lastMessage->getContent());
    }

    public function testDateSent()
    {
        $lastMessage = new LastMessage();
        $this->assertNull($lastMessage->getDateSent());

        $dateSent = $this->getRandomString(12);
        $lastMessage->setDateSent($dateSent);

        $this->assertTrue(is_string($dateSent));
        $this->assertEquals($dateSent, $lastMessage->getDateSent());
    }

    public function testParticipants()
    {
        $lastMessage = new LastMessage();
        $this->assertNull($lastMessage->getParticipants());

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

        $lastMessage->setParticipants([$participants,$participants,$participants]);

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\UserName', $lastMessage->getParticipants());
    }

    public function testReadBy()
    {
        $lastMessage = new LastMessage();
        $this->assertNull($lastMessage->isRead());
        $lastMessage->setRead(true);

        $this->assertTrue($lastMessage->isRead());
    }

    public function testSender()
    {
        $lastMessage = new LastMessage();
        $this->assertNull($lastMessage->getSender());

        $date = new \DateTime();

        $sender = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        $usercaps = $this->createMock('Alphatrader\ApiBundle\Model\UserCapabilities');

        $usercaps->expects($this->any())->method('isLevel2User')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getLevel2UserEndDate')->will($this->returnValue($date));
        $usercaps->expects($this->any())->method('getLocale')->will($this->returnValue('en_US'));
        $usercaps->expects($this->any())->method('isPartner')->will($this->returnValue(false));
        $usercaps->expects($this->any())->method('getPartnerId')->will($this->returnValue($this->getRandomString()));
        $usercaps->expects($this->any())->method('hasPremium')->will($this->returnValue(true));
        $usercaps->expects($this->any())->method('getPremiumEndDate')->will($this->returnValue($date));

        $sender->expects($this->any())->method('getId')->will($this->returnValue($this->getRandomString()));
        $sender->expects($this->any())->method('getUsername')->will($this->returnValue($this->getRandomString()));
        $sender->expects($this->any())->method('getGravatarHash')->will($this->returnValue($this->getRandomString(25)));
        $sender->expects($this->any())->method('getUserCapabilities')->will($this->returnValue($usercaps));

        $lastMessage->setSender($sender);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserName', $lastMessage->getSender());
    }
}
