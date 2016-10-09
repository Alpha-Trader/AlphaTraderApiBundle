<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 03:18
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\SecurityPrice;

/**
 * Class SecurityPriceTest
 * @package Tests\Model
 */

class SecurityPriceTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testValue()
    {
        $sp = new SecurityPrice();
        $this->assertNull($sp->getValue());

        $value = $this->getRandomFloat();
        $sp->setValue($value);

        $this->assertTrue(is_float($sp->getValue()));
        $this->assertEquals($value, $sp->getValue());
    }
}
