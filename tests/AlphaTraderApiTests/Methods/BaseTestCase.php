<?php

namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Doctrine\Common\Annotations\AnnotationReader;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializerBuilder;

abstract class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    protected $config = [
        'apiurl'   => 'http://example.com',
        'username' => 'demo',
        'password' => 'password',
        'authid'   => 'partnerid',
        'jwt'      => 'jwttoken'
    ];

    /**
     * @param $response
     *
     * @return ApiClient
     */
    public function getClient($response)
    {
        $apiclient = $this->createMock('Alphatrader\ApiBundle\Api\ApiClient');
        $apiclient->method('request')->will($this->returnValue(new Response(200, [], $response)));
        $serializer = SerializerBuilder::create();
        $serializer->setAnnotationReader(new AnnotationReader());
        $serializer->build();
        $apiclient->method('getSerializer')->will($this->returnValue($serializer));
        return $apiclient;
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
