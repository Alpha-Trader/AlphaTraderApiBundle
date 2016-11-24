<?php

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\Alliance;

/**
 * Class AllianceTest
 * @package Tests\Model
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class AllianceTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testChatId()
    {
        $alliance = new Alliance();
        $this->assertNull($alliance->getChatId());

        $value = uniqid();
        ;
        $alliance->setChatId($value);

        $this->assertEquals($value, $alliance->getChatId());
    }

    public function testId()
    {
        $alliance = new Alliance();
        $this->assertNull($alliance->getId());

        $value = uniqid();
        $alliance->setId($value);

        $this->assertEquals($value, $alliance->getId());
    }

    public function testMessageBoard()
    {
        $alliance = new Alliance();
        $this->assertNull($alliance->getMessageBoard());

        $value = $this->createMock('Alphatrader\ApiBundle\Model\MessageBoard');
        $alliance->setMessageBoard($value);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\MessageBoard', $value);
        $this->assertEquals($value, $alliance->getMessageBoard());
    }

    public function testName()
    {
        $alliance = new Alliance();
        $this->assertNull($alliance->getName());

        $value = $this->getRandomString(12);
        $alliance->setName($value);

        $this->assertEquals($value, $alliance->getName());
    }
}
