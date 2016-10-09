<?php

namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\ComplaintController;
use Symfony\Component\DependencyInjection\Tests\Compiler\C;

/**
 * Class ComplaintControllerTest
 * @package Alphatrader\ApiBundle\Api\Methods
 * @author ljbergmann <lb@sky-lab.de>
 */
class ComplaintControllerTest extends BaseTestCase
{

    public function testGetComplaintById()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\ComplaintController');
        $request->method('getComplaintById')->will($this->returnValue($expected));

        $complaint = new ComplaintController($this->config);
        $complaint->setClient($this->getClient($expected));

        $value = $complaint->getComplaintById(1);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $value);
    }

    public function testCreateComplaint()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\ComplaintController');
        $request->method('createComplaint')->will($this->returnValue($expected));

        $complaint = new ComplaintController($this->config);
        $complaint->setClient($this->getClient($expected));

        $value = $complaint->createComplaint(uniqid(), 'TEST', 'Comment');

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $value);
    }
}
