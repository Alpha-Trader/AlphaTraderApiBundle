<?php
/**
 * User: ljbergmann
 * Date: 11.11.16 21:01
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\OrderBook;

/**
 * Class OrderBookTest
 * @package Tests\Model
 */

class OrderBookTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;
    
    public function testBuyEntries()
    {
        $orderBook = new OrderBook();
        $this->assertNull($orderBook->getBuyEntries());

        $entry = $this->createMock('Alphatrader\ApiBundle\Model\OrderBookEntry');
        $orderBook->setBuyEntries($entry);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\OrderBookEntry', $orderBook->getBuyEntries());
    }

    public function testMaxBuySize()
    {
        $orderBook = new OrderBook();
        $this->assertNull($orderBook->getMaxBuySize());

        $max = $this->getRandomInteger();
        $orderBook->setMaxBuySize($max);

        $this->assertTrue(is_int($orderBook->getMaxBuySize()));
        $this->assertEquals($max, $orderBook->getMaxBuySize());
    }

    public function testMaxSellSize()
    {
        $orderBook = new OrderBook();
        $this->assertNull($orderBook->getMaxSellSize());

        $max = $this->getRandomInteger();
        $orderBook->setMaxSellSize($max);

        $this->assertTrue(is_int($orderBook->getMaxSellSize()));
        $this->assertEquals($max, $orderBook->getMaxSellSize());
    }

    public function testSellEntries()
    {
        $orderBook = new OrderBook();
        $this->assertNull($orderBook->getSellEntries());

        $entry = $this->createMock('Alphatrader\ApiBundle\Model\OrderBookEntry');
        $orderBook->setSellEntries($entry);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\OrderBookEntry', $orderBook->getSellEntries());
    }
}
