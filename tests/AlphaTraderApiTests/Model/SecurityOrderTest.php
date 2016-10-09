<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 02:51
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\SecurityOrder;

/**
 * Class SecurityOrderTest
 * @package Tests\Model
 */

class SecurityOrderTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testCounterPartyName()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getCounterParty());

        $name = $this->getRandomString();
        $secOrder->setCounterPartyName($name);

        $this->assertTrue(is_string($secOrder->getCounterPartyName()));
        $this->assertEquals($name, $secOrder->getCounterPartyName());
    }

    public function testOwnerName()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getOwnerName());

        $name = $this->getRandomString();
        $secOrder->setOwnerName($name);

        $this->assertTrue(is_string($secOrder->getOwnerName()));
        $this->assertEquals($name, $secOrder->getOwnerName());
    }

    public function testCreationDate()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getCreationDate());

        $date = mt_rand(12000000, 160000000);
        $secOrder->setCreationDate($date);

        $this->assertTrue(is_int($secOrder->getCreationDate()));
        $this->assertEquals($date, $secOrder->getCreationDate());
    }

    public function testSecurityIdentifier()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getSecurityIdentifier());

        $name = $this->getRandomString();
        $secOrder->setSecurityIdentifier($name);

        $this->assertTrue(is_string($secOrder->getSecurityIdentifier()));
        $this->assertEquals($name, $secOrder->getSecurityIdentifier());
    }

    public function testCommittedCash()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getCommittedCash());

        $cash = $this->getRandomFloat();
        $secOrder->setCommittedCash($cash);

        $this->assertTrue(is_float($secOrder->getCommittedCash()));
        $this->assertEquals($cash, $secOrder->getCommittedCash());
    }

    public function testAction()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getAction());

        $action = $this->getRandomString();
        $secOrder->setAction($action);

        $this->assertTrue(is_string($secOrder->getAction()));
        $this->assertEquals($action, $secOrder->getAction());
    }

    public function testNumberOfShares()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getNumberOfShares());

        $shares = mt_rand(1000, 5000);
        $secOrder->setNumberOfShares($shares);

        $this->assertTrue(is_int($secOrder->getNumberOfShares()));
        $this->assertEquals($shares, $secOrder->getNumberOfShares());
    }

    public function testListing()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getListing());

        $listing = $this->createMock("Alphatrader\ApiBundle\Model\Listing");
        $secOrder->setListing($listing);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\Listing", $secOrder->getListing());
    }

    public function testCounterParty()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getCounterParty());

        $name = $this->getRandomString();
        $secOrder->setCounterParty($name);

        $this->assertTrue(is_string($secOrder->getCounterParty()));
        $this->assertEquals($name, $secOrder->getCounterParty());
    }

    public function testPrice()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getPrice());

        $price = $this->getRandomFloat();
        $secOrder->setPrice($price);

        $this->assertTrue(is_float($secOrder->getPrice()));
        $this->assertEquals($price, $secOrder->getPrice());
    }

    public function testOwner()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getOwner());

        $owner = $this->getRandomString();
        $secOrder->setOwner($owner);

        $this->assertTrue(is_string($secOrder->getOwner()));
        $this->assertEquals($owner, $secOrder->getOwner());
    }

    public function testId()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getId());

        $uid = uniqid();
        $secOrder->setId($uid);

        $this->assertTrue(is_string($secOrder->getId()));
        $this->assertEquals($uid, $secOrder->getId());
    }

    public function testType()
    {
        $secOrder = new SecurityOrder();
        $this->assertNull($secOrder->getType());

        $type = $this->getRandomString();
        $secOrder->setType($type);

        $this->assertTrue(is_string($secOrder->getType()));
        $this->assertEquals($type, $secOrder->getType());
    }
}
