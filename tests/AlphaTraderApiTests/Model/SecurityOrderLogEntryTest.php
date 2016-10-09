<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 03:11
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\SecurityOrderLogEntry;

/**
 * Class SecurityOrderLogEntryTest
 * @package Tests\Model
 */

class SecurityOrderLogEntryTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testId()
    {
        $secOrder = new SecurityOrderLogEntry();
        $this->assertNull($secOrder->getId());

        $uid = uniqid();
        $secOrder->setId($uid);

        $this->assertTrue(is_string($secOrder->getId()));
        $this->assertEquals($uid, $secOrder->getId());
    }

    public function testBuyerSecAcc()
    {
        $secOrder = new SecurityOrderLogEntry();
        $this->assertNull($secOrder->getBuyerSecuritiesAccount());

        $string = $this->getRandomString();
        $secOrder->setBuyerSecuritiesAccount($string);

        $this->assertTrue(is_string($secOrder->getBuyerSecuritiesAccount()));
        $this->assertEquals($string, $secOrder->getBuyerSecuritiesAccount());
    }

    public function testNumberOfShares()
    {
        $secOrder = new SecurityOrderLogEntry();
        $this->assertNull($secOrder->getNumberOfShares());

        $shares = mt_rand(1000, 5000);
        $secOrder->setNumberOfShares($shares);

        $this->assertTrue(is_int($secOrder->getNumberOfShares()));
        $this->assertEquals($shares, $secOrder->getNumberOfShares());
    }

    public function testPrice()
    {
        $secOrder = new SecurityOrderLogEntry();
        $this->assertNull($secOrder->getPrice());

        $price = $this->getRandomFloat();
        $secOrder->setPrice($price);

        $this->assertTrue(is_float($secOrder->getPrice()));
        $this->assertEquals($price, $secOrder->getPrice());
    }

    public function testSecurityIdentifier()
    {
        $secOrder = new SecurityOrderLogEntry();
        $this->assertNull($secOrder->getSecurityIdentifier());

        $name = $this->getRandomString();
        $secOrder->setSecurityIdentifier($name);

        $this->assertTrue(is_string($secOrder->getSecurityIdentifier()));
        $this->assertEquals($name, $secOrder->getSecurityIdentifier());
    }

    public function testSellerSecAcc()
    {
        $secOrder = new SecurityOrderLogEntry();
        $this->assertNull($secOrder->getSellerSecuritiesAccount());

        $string = $this->getRandomString();
        $secOrder->setSellerSecuritiesAccount($string);

        $this->assertTrue(is_string($secOrder->getSellerSecuritiesAccount()));
        $this->assertEquals($string, $secOrder->getSellerSecuritiesAccount());
    }

    public function testVolume()
    {
        $secOrder = new SecurityOrderLogEntry();
        $this->assertNull($secOrder->getVolume());

        $volume = $this->getRandomFloat();
        $secOrder->setVolume($volume);

        $this->assertTrue(is_float($secOrder->getVolume()));
        $this->assertEquals($volume, $secOrder->getVolume());
    }
}
