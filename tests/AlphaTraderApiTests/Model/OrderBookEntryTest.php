<?php
/**
 * User: ljbergmann
 * Date: 11.11.16 21:06
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\OrderBookEntry;

/**
 * Class OrderBookEntryTest
 * @package Tests\Model
 */

class OrderBookEntryTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testAction()
    {
        $orderBookEntry = new OrderBookEntry();
        $this->assertNull($orderBookEntry->getAction());

        $action = $this->getRandomString();
        $orderBookEntry->setAction($action);

        $this->assertTrue(is_string($orderBookEntry->getAction()));
        $this->assertEquals($action, $orderBookEntry->getAction());
    }

    public function testPriceLimit()
    {
        $orderBookEntry = new OrderBookEntry();
        $this->assertNull($orderBookEntry->getPriceLimit());

        $value = $this->getRandomFloat();
        $orderBookEntry->setPriceLimit($value);

        $this->assertTrue(is_float($orderBookEntry->getPriceLimit()));
        $this->assertEquals($value, $orderBookEntry->getPriceLimit());
    }

    public function testSize()
    {
        $orderBookEntry = new OrderBookEntry();
        $this->assertNull($orderBookEntry->getSize());

        $value = $this->getRandomInteger();
        $orderBookEntry->setSize($value);

        $this->assertTrue(is_int($orderBookEntry->getSize()));
        $this->assertEquals($value, $orderBookEntry->getSize());
    }
}
