<?php
/**
 * User: ljbergmann
 * Date: 08.10.16 23:30
 */

namespace AlphaTraderApiTests\Model;

use Alphatrader\ApiBundle\Model\MessagePrototype;

/**
 * Class MessagePrototypeTest
 * @package AlphaTraderApiTests\Model
 */

class MessagePrototypeTest extends \PHPUnit_Framework_TestCase
{
    public function testFilledString()
    {
        $messagePrototype = new MessagePrototype();
        $this->assertNull($messagePrototype->getFilledString());

        $content = $this->getRandomString(600);
        $messagePrototype->setFilledString($content);

        $this->assertTrue(is_string($messagePrototype->getFilledString()));
        $this->assertEquals($content,$messagePrototype->getFilledString());
    }

    public function testMessage()
    {
        $messagePrototype = new MessagePrototype();
        $this->assertNull($messagePrototype->getMessage());

        $content = $this->getRandomString(600);
        $messagePrototype->setMessage($content);

        $this->assertTrue(is_string($messagePrototype->getMessage()));
        $this->assertEquals($content,$messagePrototype->getMessage());
    }

    public function testSubstitutions()
    {
        $messagePrototype = new MessagePrototype();
        $this->assertNull($messagePrototype->getSubstitutions());

        $substitutions = $this->createMock('\Doctrine\Common\Collections\ArrayCollection');
        $messagePrototype->setSubstitutions($substitutions);

        $this->assertInstanceOf('\Doctrine\Common\Collections\ArrayCollection',$messagePrototype->getSubstitutions());
    }

    /*
    * @param int $length
    * @return string
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
