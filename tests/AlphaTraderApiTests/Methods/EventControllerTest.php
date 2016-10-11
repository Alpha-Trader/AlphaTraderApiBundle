<?php

namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\EventController;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class EventControllerTest
 * @package Alphatrader\ApiBundle\Api\Methods
 * @author ljbergmann <lb@sky-lab.de>
 */
class EventControllerTest extends BaseTestCase
{
    public function testGetEvents()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\EventController');
        $request->method('getEvents')->willReturn($expected);

        $eventController = new EventController($this->config);
        $eventController->setClient($this->getClient($expected));

        $value = $eventController->getEvents(200);

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Error', $value);
    }

    public function testGetEventsForUser()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\EventController');
        $request->method('getEventsForUser')->willReturn($expected);

        $eventController = new EventController($this->config);
        $eventController->setClient($this->getClient($expected));

        $value = $eventController->getEventsForUser(1);

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Error', $value);
    }

    public function testSearchEvents()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\EventController');
        $request->method('searchEvents')->willReturn($expected);

        $eventController = new EventController($this->config);
        $eventController->setClient($this->getClient($expected));

        $value = $eventController->searchEvents('Trade', 200);

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Error', $value);
    }

    public function testSearchEventsByType()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\EventController');
        $request->method('searchEventsByType')->willReturn($expected);

        $eventController = new EventController($this->config);
        $eventController->setClient($this->getClient($expected));

        $value = $eventController->searchEventsByType('NEW_USER', 'Trade', 200);

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Error', $value);
    }

    public function testSearchEventsByFullTextPart()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\EventController');
        $request->method('searchEventsByFullTextPart')->willReturn($expected);

        $eventController = new EventController($this->config);
        $eventController->setClient($this->getClient($expected));

        $value = $eventController->searchEventsByFullTextPart('buyer', 6345678);

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\Error', $value);
    }
}
