<?php
/**
 * User: ljbergmann
 * Date: 05.10.16 00:59
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\Error;

/**
 * Class ErrorTest
 * @package AlphaTraderApiTests\Model
 */

class ErrorTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testCode()
    {
        $error = new Error();
        $this->assertNull($error->getCode());
        
        $code = $this->getRandomString(12);
        $error->setCode($code);
        
        $this->assertTrue(is_string($code));
        $this->assertEquals($code, $error->getCode());
    }

    public function testMessage()
    {
        $error = new Error();
        $this->assertNull($error->getMessage());
        
        $message = $this->getRandomString(600);
        $error->setMessage($message);
        
        $this->assertTrue(is_string($error->getMessage()));
        $this->assertEquals($message, $error->getMessage());
    }

    public function testMessagePrototype()
    {
        $error = new Error();
        $this->assertNull($error->getMessagePrototype());
        
        $messagePrototype = $this->createMock('Alphatrader\ApiBundle\Model\MessagePrototype');
        $messagePrototype->expects($this->any())->method('getFilledString')->willReturn($this->getRandomString(600));
        $messagePrototype->expects($this->any())->method('getMessage')->willReturn($this->getRandomString(600));
        $messagePrototype->expects($this->any())->method('getSubstitutions')->willReturn([$this->getRandomString(20),$this->getRandomString(20)]);

        $error->setMessagePrototype($messagePrototype);
        
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\MessagePrototype', $error->getMessagePrototype());
    }
}
