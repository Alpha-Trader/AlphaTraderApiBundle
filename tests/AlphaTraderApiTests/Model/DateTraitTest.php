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
    
    public function testAfterDeserialization()
    {
        $time = 1474099171103;
        $this->traitObject->setDate($time);
        $this->traitObject->setStartDate($time);
        $this->traitObject->setEndDate($time);

        $date = substr($time, 0, 10) . '.' . substr($time, 10);
        $micro = sprintf("%06d", ($date - floor($date)) * 1000000);
        $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $date));

        $this->invokeMethod($this->traitObject, 'afterDeserialization');
        $this->assertEquals($date, $this->traitObject->getDate());
    }
    
    public function testPreSerialization()
    {
        $date = new \DateTime('now');
        $this->traitObject->setDate($date);
        $this->traitObject->setStartDate($date);
        $this->traitObject->setEndDate($date);

        $expected = $date->getTimestamp();
        $this->invokeMethod($this->traitObject, 'preSerialization');

        $this->assertEquals($expected, $this->traitObject->getDate());
        $this->assertEquals($expected, $this->traitObject->getStartDate());
        $this->assertEquals($expected, $this->traitObject->getEndDate());
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
