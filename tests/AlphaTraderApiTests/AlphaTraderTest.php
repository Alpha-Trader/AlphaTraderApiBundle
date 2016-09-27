<?php

namespace Tests;

use Alphatrader\ApiBundle\Api\AlphaTrader;
use PHPUnit\Framework\TestCase;

class AlphaTraderTest extends TestCase
{
    protected $client;

    protected $config = [
        'apiurl'   => 'http://stable.alpha-trader.com',
        'username' => 'demo',
        'password' => 'password',
        'authid'   => 'partnerid',
        'jwt'      => 'jwttoken'
    ];

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->client = new AlphaTrader($this->config);
    }

    public function test_createClient()
    {
        self::assertInstanceOf(AlphaTrader::class, $this->client);
    }
    
    public function test_formatTimeStamp()
    {
        $timestamp = $this->invokeMethod($this->client, 'formatTimeStamp', array(new \DateTime()));
        $this->assertTrue(is_int($timestamp));
        $time = mt_rand(1262055681,1474823143);
        $timestamp = $this->invokeMethod($this->client, 'formatTimeStamp', array($time));
        $this->assertTrue(is_int($timestamp));
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