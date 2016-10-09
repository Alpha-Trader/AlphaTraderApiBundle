<?php
/**
 * User: ljbergmann
 * Date: 05.10.16 01:12
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\Events;

/**
 * Class EventsTest
 * @package AlphaTraderApiTests\Model
 */

class EventsTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
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
}
