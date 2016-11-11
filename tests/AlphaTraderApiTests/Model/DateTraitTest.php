<?php

namespace Tests\Model;

class DateTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Alphatrader\ApiBundle\Model\DateTrait
     */
    private $traitObject;

    public function setUp()
    {
        $this->traitObject = $this->createObjectForTrait();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\DateTrait
     */
    private function createObjectForTrait()
    {
        $traitName = 'Alphatrader\ApiBundle\Model\DateTrait';

        return $this->getObjectForTrait($traitName);
    }

    public function testDateInstance()
    {
        $expected = new \DateTime();
        $this->traitObject->setDate($expected);
        $reflection = new \ReflectionClass($this->traitObject);
        $reflection_property = $reflection->getProperty('startDate');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($this->traitObject, 1427371836);

        $this->assertInstanceOf('DateTime', $this->traitObject->getDate());
    }

    public function testDateIsSameForSameObject()
    {
        $expected = new \DateTime();
        $this->traitObject->setDate($expected);
        $this->traitObject->setStartDate($expected);
        $this->traitObject->setEndDate($expected);

        $this->assertEquals($expected, $this->traitObject->getDate());
        $this->assertEquals($expected, $this->traitObject->getStartDate());
        $this->assertEquals($expected, $this->traitObject->getEndDate());
    }

    public function testDateIsDifferentForDifferentObject()
    {
        $expected = new \DateTime();
        $this->traitObject->setDate($expected);
        $this->traitObject->setStartDate($expected);
        $this->traitObject->setEndDate($expected);

        $this->assertNotEquals($expected, $this->createObjectForTrait()->getDate());
        $this->assertNotEquals($expected, $this->createObjectForTrait()->getStartDate());
        $this->assertNotEquals($expected, $this->createObjectForTrait()->getEndDate());
    }
}
