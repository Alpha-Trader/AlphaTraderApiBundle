<?php
/**
 * User: ljbergmann
 * Date: 05.10.16 00:59
 */

namespace AlphaTraderApiTests\Model;

use Alphatrader\ApiBundle\Model\Error;

/**
 * Class ErrorTest
 * @package AlphaTraderApiTests\Model
 */

class ErrorTest extends \PHPUnit_Framework_TestCase
{
    public function testCode(){
        $error = new Error();
        $this->assertNull($error->getCode());
        
        $code = $this->getRandomString(12);
        $error->setCode($code);
        
        $this->assertTrue(is_string($code));
        $this->assertEquals($code,$error->getCode());
    }

    public function testMessage(){
        $error = new Error();
        $this->assertNull($error->getMessage());
        
        $message = $this->getRandomString(600);
        $error->setMessage($message);
        
        $this->assertTrue(is_string($error->getMessage()));
        $this->assertEquals($message,$error->getMessage());
    }

    public function testMessagePrototype(){
        $error = new Error();
        $this->assertNull($error->getMessagePrototype());
        
        $messagePrototype = $this->createMock('Alphatrader\ApiBundle\Model\MessagePrototype');
        $messagePrototype->expects($this->any())->method('getFilledString')->willReturn($this->getRandomString(600));
        $messagePrototype->expects($this->any())->method('getMessage')->willReturn($this->getRandomString(600));
        $messagePrototype->expects($this->any())->method('getSubstitutions')->willReturn([$this->getRandomString(20),$this->getRandomString(20)]);

        $error->setMessagePrototype($messagePrototype);
        
        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\MessagePrototype',$error->getMessagePrototype());

    }
    
    /**
     * @param int $min
     * @param int $max
     * @return mixed
     */
    private function getRandomFloat($min=1,$max=50000000){
        return mt_rand($min,$max) + (rand()/mt_getrandmax());
    }

    /*
    * @param $length
    */
    private function getRandomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
}
