<?php

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\MessageBoard;

/**
 * Class MessageBoardTest
 * @package Tests\Model
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class MessageBoardTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testDateCreated()
    {
        $ms = new MessageBoard();
        $this->assertNull($ms->getDateCreated());

        $value = new \DateTime();
        $ms->setDateCreated($value);

        $this->assertEquals($value, $ms->getDateCreated());
    }

    public function testId()
    {
        $ms = new MessageBoard();
        $this->assertNull($ms->getId());

        $value = uniqid();
        $ms->setId($value);

        $this->assertEquals($value, $ms->getId());
    }

    public function testName()
    {
        $ms = new MessageBoard();
        $this->assertNull($ms->getName());

        $value = $this->getRandomString();
        $ms->setName($value);

        $this->assertEquals($value, $ms->getName());
    }

    public function testParent()
    {
        $ms = new MessageBoard();
        $this->assertNull($ms->getParent());

        $value = $this->getRandomString();
        $ms->setParent($value);

        $this->assertEquals($value, $ms->getParent());
    }
}
