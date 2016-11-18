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
        try {
            $val = $complaint->getComplaintById(1);
        } catch (\RuntimeException $val) {
            $this->assertInstanceOf('Alphatrader\ApiBundle\Api\Exception\AlphaTraderApiException', $val);
        }
    }

    public function testCreateComplaint()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\ComplaintController');
        $request->method('createComplaint')->will($this->returnValue($expected));

        $complaint = new ComplaintController($this->config);
        $complaint->setClient($this->getClient($expected));
        try {
            $value = $complaint->createComplaint(uniqid(), 'TEST', 'Comment');
        } catch (\RuntimeException $val) {
            $this->assertInstanceOf('Alphatrader\ApiBundle\Api\Exception\AlphaTraderApiException', $val);
        }
    }
}
