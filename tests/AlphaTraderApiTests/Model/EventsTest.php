<?php
/**
 * User: ljbergmann
 * Date: 05.10.16 01:12
 */

namespace AlphaTraderApiTests\Model;

use Alphatrader\ApiBundle\Model\Events;

/**
 * Class EventsTest
 * @package AlphaTraderApiTests\Model
 */

class EventsTest extends \PHPUnit_Framework_TestCase
{
    public function testContent()
    {
        $events = new Events();
        $this->assertNull($events->getContent());
        
        $array = [[],[],[]];
        
        $events->setContent($array);
        
        $this->assertTrue(is_array($events->getContent()));
        $this->assertEquals($array, $events->getContent());
    }

    public function testRealms()
    {
        $events = new Events();
        $this->assertNull($events->getRealms());

        $realms = [$this->getRandomString(12),$this->getRandomString(50)];

        $events->setRealms($realms);

        $this->assertEquals($realms, $events->getRealms());
    }

    public function testType()
    {
        $events = new Events();
        $this->assertNull($events->getType());

        $type = $this->getRandomString(12);

        $events->setType($type);

        $this->assertTrue(is_string($events->getType()));
        $this->assertEquals($type, $events->getType());
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
