<?php
/**
 * User: ljbergmann
 * Date: 08.10.16 23:30
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\MessagePrototype;

/**
 * Class MessagePrototypeTest
 * @package AlphaTraderApiTests\Model
 */

class MessagePrototypeTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testFilledString()
    {
        $messagePrototype = new MessagePrototype();
        $this->assertNull($messagePrototype->getFilledString());

        $content = $this->getRandomString(600);
        $messagePrototype->setFilledString($content);

        $this->assertTrue(is_string($messagePrototype->getFilledString()));
        $this->assertEquals($content, $messagePrototype->getFilledString());
    }

    public function testMessage()
    {
        $messagePrototype = new MessagePrototype();
        $this->assertNull($messagePrototype->getMessage());

        $content = $this->getRandomString(600);
        $messagePrototype->setMessage($content);

        $this->assertTrue(is_string($messagePrototype->getMessage()));
        $this->assertEquals($content, $messagePrototype->getMessage());
    }

    public function testSubstitutions()
    {
        $messagePrototype = new MessagePrototype();
        $this->assertNull($messagePrototype->getSubstitutions());

        $substitutions = $this->createMock('\Doctrine\Common\Collections\ArrayCollection');
        $messagePrototype->setSubstitutions($substitutions);

        $this->assertInstanceOf('\Doctrine\Common\Collections\ArrayCollection', $messagePrototype->getSubstitutions());
    }
}
